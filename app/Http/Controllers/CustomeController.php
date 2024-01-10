<?php

namespace App\Http\Controllers;

use App\Models\Custome;
use Illuminate\Http\Request;

class CustomeController extends Controller
{
    public function index()
    {
        return Custome::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['nullable', 'email', 'max:254'],
        ]);

        return Custome::create($data);
    }

    public function show(Custome $custome)
    {
        return $custome;
    }

    public function update(Request $request, Custome $custome)
    {
        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['nullable', 'email', 'max:254'],
        ]);

        $custome->update($data);

        return $custome;
    }

    public function destroy(Custome $custome)
    {
        $custome->delete();

        return response()->json();
    }
}
