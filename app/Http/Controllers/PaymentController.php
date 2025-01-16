<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class PaymentController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Ambil payload dari webhook
        $payload = $request->all();

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Verifikasi payload
        $orderId = $payload['order_id'] ?? null;
        $transactionStatus = $payload['transaction_status'] ?? null;

        if (!$orderId || !$transactionStatus) {
            return response()->json(['status' => 'error', 'message' => 'Invalid payload'], 400);
        }

        // Cari order berdasarkan order_id
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
        }

        // Update status order berdasarkan status transaksi
        if (in_array($transactionStatus, ['capture', 'settlement'])) {
            $order->payment_status = 'paid';
            $order->save();

            // Kurangi stok produk
            foreach ($order->orderItems as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->stock -= $item->quantity;
                    $product->save();
                }
            }
        } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            $order->payment_status = 'failed';
            $order->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Webhook handled successfully'], 200);
    }
}
