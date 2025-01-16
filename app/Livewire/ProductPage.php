<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products - LarvaGo')]
class ProductPage extends Component
{
    use LivewireAlert;
    
    public $products;

    public function mount()
    {
        // Ambil produk dari database
        $this->products = Product::all(); // Anda bisa menggunakan metode lain seperti paginate() jika diperlukan
    }

    // add product to cart

    public function addToCart($product_id) {
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product added to cart', [
            'position' =>  'bottom-end',
            'timer' =>  3000,
            'toast' =>  true,
        ]);
    }

    public function render()
    {
        // Kirim data produk ke view
        return view('livewire.product-page', ['products' => $this->products]);
    }
}