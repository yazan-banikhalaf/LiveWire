<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetails;
use Illuminate\Http\Request;

class PaymentDetailsController extends Controller
{
    public function index()
    {
        return PaymentDetails::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product' => ['required'],
            'note' => ['nullable'],
            'price' => ['required'],
        ]);

        return PaymentDetails::create($data);
    }

    public function show(PaymentDetails $paymentDetails)
    {
        return $paymentDetails;
    }

    public function update(Request $request, PaymentDetails $paymentDetails)
    {
        $data = $request->validate([
            'product' => ['required'],
            'note' => ['nullable'],
            'price' => ['required'],
        ]);

        $paymentDetails->update($data);

        return $paymentDetails;
    }

    public function destroy(PaymentDetails $paymentDetails)
    {
        $paymentDetails->delete();

        return response()->json();
    }
}
