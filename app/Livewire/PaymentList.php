<?php

namespace App\Livewire;

use App\Models\Barber;
use App\Models\Payment;
use Livewire\Component;

class PaymentList extends Component
{
    public $search = '';
    public $dateFilter = '';
    public $statusFilter = '';
    public $barberFilter = '';

    public $typeFilter = '';
    public $detailsFilter = false;


    public function render()
    {
        $query = Payment::query();

        // Search Filter
        if (!empty($this->search)) {
            $query->whereHas('customer', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }

        // Date Filter
        if ($this->dateFilter === 'today') {
            $query->whereDate('created_at', now());
        } elseif ($this->dateFilter === 'this_month') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        }

        // Status Filter
        if (!empty($this->statusFilter)) {
            $query->where('status', $this->statusFilter);
        }

        // Barber Filter
        if (!empty($this->barberFilter)) {
            $query->whereHas('barber', function ($query) {
                $query->where('id', $this->barberFilter);
            });
        }

        if (!empty($this->typeFilter)) {
            $query->where('type', $this->typeFilter);
        }

        // Payment Details Filter
        if ($this->detailsFilter) {
            $query->has('details');
        }

        $barbers = Barber::get();
        $payments = $query->orderBy('id', 'DESC')->paginate(20);
        return view('livewire.payment-list', compact('payments' , 'barbers'));
    }

}
