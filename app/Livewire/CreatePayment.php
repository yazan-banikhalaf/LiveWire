<?php

namespace App\Livewire;

use App\Models\Barber;
use App\Models\Customer;
use App\Models\Payment;
use Livewire\Component;

class CreatePayment extends Component
{
    public $barber;
    public $customer = '';
    public $check;
    public $price;
    public $type;

    public $customer_id;

    public $show_details = false;

    public $customers = [];

    public function render()
    {
        if (!empty($this->customer)) {
            $this->customers = Customer::where('name', 'like', '%' . $this->customer . '%')
                ->get(['id', 'name']);
        } else {
            $this->customers = collect();
        }

        $barbers = Barber::get();
        return view('livewire.create-payment' , compact('barbers' ));
    }

    public function submit()
    {
         $this->validate([
            'customer' => 'required',
            'barber' => 'required',
            'price' => 'required',
            'type' => 'required|in:cash,qlik',
        ]);

        Payment::create([
            'customer_id' => $this->customer_id,
            'barber_id' => $this->barber,
            'price' => $this->price,
            'type' => $this->type,
        ]);
    }

    public function selectCustomer($customer_name)
    {
        $this->customer = $customer_name;
        $customer = Customer::where('name' , $customer_name)->first();
        $this->customer_id = $customer->id;
    }

    public function toggleDetails()
    {
        if ($this->check) {
            $this->show_details = true;
        } else{
            $this->show_details = false;
        }
    }

    public function creatCustomer()
    {
        Customer::create([
            'name' => $this->customer
        ]);
    }
}
