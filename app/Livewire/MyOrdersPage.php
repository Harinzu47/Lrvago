<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('My Orders')]
class MyOrdersPage extends Component
{
    use WithPagination;

    public $showReviewForm = false;
    public $selectedOrderId;

    protected $listeners = ['openReviewModal'];

    public function openReviewModal($orderId)
    {
        $this->selectedOrderId = $orderId;
        $this->showReviewForm = true;
    }

    public function closeReviewModal()
    {
        $this->showReviewForm = false;
        $this->selectedOrderId = null;
    }

    public function render()
    {
        $my_orders = Order::where('user_id', auth()->id())->latest()->paginate(5);
        return view('livewire.my-orders-page', [
            'orders' => $my_orders,
        ]);
    }
}