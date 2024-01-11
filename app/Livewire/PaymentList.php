<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;

class PaymentList extends Component
{
    public $search = '';

    public function render()
    {

//        $payments = Payment::where('name','like','%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(20);

    $payments = Payment::paginate(20);
        return view('livewire.payment-list' , compact('payments'));
    }
}
