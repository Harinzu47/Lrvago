<?php

namespace App\Livewire;

use Livewire\Component;

class PaymentPage extends Component
{

    public $snapToken;
    
    public function mount($snapToken)
    {
        $this->snapToken = $snapToken;
    }

    public function render()
    {
        return view('livewire.payment-page');
    }
}
