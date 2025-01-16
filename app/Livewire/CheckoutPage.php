<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Adress;
use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Services\RajaOngkirService;
use Illuminate\Support\Facades\Http;

#[Title('Checkout')]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_adress;
    public $city;
    public $kelurahan;
    public $kecamatan;
    public $kode_pos;
    public $payment_method;
    public $shipping_cost = 0; // Variabel untuk menyimpan ongkos kirim
    public $provinces = [];
    public $cities = [];
    public $selected_province;
    public $selected_city;

    protected $rajaOngkirService;

    public function mount()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        if(count($cart_items) == 0){
            return redirect()->route('products');
        }
        $this->selected_province = 3;
        $this->provinces = $this->fetchProvinces();
       
    }

    public function updatedSelectedProvince($provinceId)
    {
        if ($provinceId) {
            $this->cities = $this->fetchCities($provinceId);
        } else {
            $this->cities = [];
        }
    }

    private function fetchProvinces()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/province');

        return $response->json()['rajaongkir']['results'] ?? [];
    }

    private function fetchCities($provinceId)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/city', [
            'province' => $provinceId
        ]);

        return $response->json()['rajaongkir']['results'] ?? [];
    }

    // public function calculateShipping()
    // {
    //     // Ganti dengan ID kota asal yang sesuai
    //     $origin = 501; // ID kota asal (misalnya Jakarta)
    //     $destination = $this->selected_city; // ID kota tujuan dari dropdown
    //     $weight = 1000; // Berat dalam gram
    //     $courier = 'jne'; // Kode kurir yang dipilih

    //     $cost = $this->rajaOngkirService->getCost($origin, $destination, $weight, $courier);

    //     // Ambil ongkos kirim dari respons
    //     if (isset($cost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'])) {
    //         $this->shipping_cost = $cost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
    //     }
    // }

    public function placeOrder()
    {
        // Validasi input dari form checkout
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'street_adress' => 'required',
            'city' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'payment_method' => 'required',
        ]);
    
        // Ambil item dari keranjang belanja
        $cart_items = CartManagement::getCartItemsFromCookie();
    
        // Buat entri Order baru
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = CartManagement::calculateTotalPrice($cart_items); // Total harga barang
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pending'; // Default status pembayaran
        $order->status = 'new'; // Status order baru
        $order->currency = 'idr'; // Mata uang
        $order->shipping_method = 'none'; // Tidak ada metode pengiriman yang spesifik untuk sekarang
        $order->shipping_amount = $this->shipping_cost; // Ongkos kirim
        $order->notes = 'Order Placed By ' . auth()->user()->name;
        $order->save(); // Simpan ke database untuk mendapatkan order_id

        $order->orderItems()->createMany($cart_items);

        // Bersihkan item dari keranjang belanja
        CartManagement::clearCartItemsFromCookie();
    
        // Buat entri Address yang terhubung ke Order
        $adress = new Adress();
        $adress->order_id = $order->id; // Kaitkan dengan order
        $adress->first_name = $this->first_name;
        $adress->last_name = $this->last_name;
        $adress->phone = $this->phone;
        $adress->street_adress = $this->street_adress;
        $adress->city = $this->city;
        $adress->kelurahan = $this->kelurahan;
        $adress->kecamatan = $this->kecamatan;
        $adress->kode_pos = $this->kode_pos;
        $adress->save();
    
        // Atur URL redirect berdasarkan metode pembayaran
        $redirect_url = '';
    
        if ($this->payment_method === 'midtrans') {
            // Buat entri Payment untuk metode Midtrans
            $payment = Payment::create([
                'order_id' => $order->id,
                'amount' => $order->total_price,
                'method' => 'Midtrans',
                'status' => 'pending',
                'payment_date' => now(),
            ]);
    
            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
    
            // Siapkan parameter untuk transaksi
            $params = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ],
                'customer_details' => [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => auth()->user()->email,
                    'phone' => $this->phone,
                    'billing_address' => [
                        'address' => $this->street_adress,
                        'city' => $this->city,
                        'postal_code' => $this->kode_pos,
                    ],
                ],
            ];
    
            // Ambil Snap Token dari Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $payment->snap_token = $snapToken;
            $payment->save();
    
            // Redirect ke halaman Snap Midtrans
            return redirect()->route('payment-page', ['snapToken' => $snapToken]);

        } else {
            // Jika metode pembayaran manual, redirect ke halaman sukses
            $redirect_url = route('success');
            return redirect($redirect_url);
        }
    
        
    }
    

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $total_price = CartManagement::calculateTotalPrice($cart_items); // Tambahkan ongkos kirim ke total harga

        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'total_price' => $total_price,
        ]);
    }
}
