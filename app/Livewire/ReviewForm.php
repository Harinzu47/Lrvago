<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Review;
use Livewire\Component;

class ReviewForm extends Component
{
    public $orderId; // Properti untuk menyimpan ID pesanan
    public $rating;
    public $review;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'required|string|max:255',
    ];

    public function mount($order_id)
    {
        // Pastikan ID pesanan diteruskan dan diinisialisasi
        $this->orderId = $order_id;
    }

    public function submit()
    {
        $this->validate();

        Review::create([
            'order_id' => $this->orderId, // Menggunakan $this->orderId
            'user_id' => auth()->id(),
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        // Reset fields after submission
        $this->reset(['rating', 'review']);

        // Emit an event or redirect if needed
        return redirect('/my-orders')->with('message', 'Review submitted successfully!');
    }

    public function render()
    {
        $order = Order::find($this->orderId); // Ambil pesanan berdasarkan $this->orderId
        return view('livewire.review-form', [
            'order' => $order
        ]);
    }
}
