<?php

namespace App\Http\Controllers;

use App\Livewire\Barbers;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $barber_count = Barber::count();

        $customer_count = Customer::count();

        $payment_total = Payment::sum('price');

        $payment_details_total = PaymentDetails::sum('price');

        $data = [
            'barber' => $barber_count,
            'customer' => $customer_count,
            'payment_total' => $payment_total,
            'payment_details_total' =>$payment_details_total
        ];

        $totalsPerBarberToday = $this->getTotalPricePerBarberToday();
        $payments = Payment::latest()->take(5)->get();

        return view('dashboard' , compact('data' , 'payments' ,'totalsPerBarberToday'));

    }

    public function getTotalPricePerBarberToday()
    {
        $today = Carbon::today();

        // Fetch payments for today along with related barber data
        $payments = Payment::with('barber')
            ->whereDate('created_at', $today)
            ->get();

        // Group by barber_id and sum the price
        $totals = $payments->groupBy('barber_id')
            ->map(function ($group) {
                return [
                    'barber_name' => $group->first()->barber->name,
                    'total_price' => $group->sum('price')
                ];
            });

        return $totals;
    }
}
