<?php

namespace App\Livewire;

use App\Models\Review;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Jual Maggot Online - Larva Go | Solusi Pengelolaan Limbah Organik')]

class HomePage extends Component
{
    public function render()
    {
        $products = Product::all();
        $reviews = Review::with('user')->latest()->get();
        return view('livewire.home-page',  [
            'products' => $products,
            'reviews' => $reviews,
        ]);
    }
}
