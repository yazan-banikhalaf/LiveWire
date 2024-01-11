<?php

namespace App\Livewire;

use App\Models\Barber;
use App\Models\Customer;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Customers extends Component
{
    public $search = '';
    public $customer_id;
    public $showForm = false;
    public $name;
    public $email;
    public $phone;

    public $deletingCustomerId = null;


    public function resetFields()
    {
        $this->customer_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
    }
    public function toggleForm()
    {
        $this->showForm = true;
        $this->resetFields();
    }
    public function cancelBox()
    {
        $this->showForm = false;
        $this->resetFields();
    }
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:customers,email|exclude_if:email,null',
            'phone' => 'nullable|unique:customers,phone|exclude_if:phone,null',
        ]);
        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);
        session()->flash('message', 'Customer created successfully!');
        $this->cancelBox();
        return redirect('customers');
    }

    public function edit($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => ['nullable', 'email', Rule::unique('customers', 'email')->ignore($this->customer_id)],
            'phone' => ['nullable', Rule::unique('customers', 'phone')->ignore($this->customer_id)],
        ]);
        $customer = Customer::findOrFail($this->customer_id);

        $customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'Customer updated successfully!');
        return redirect('/customers');
    }
    public function destroy($id)
    {
        Customer::findorfail($id)->delete();
        session()->flash('message', 'Customer deleted successfully!');
        $this->deletingCustomerId = null;
        return redirect('/customers');
    }

    public function confirmDeletion($customerId)
    {
        $this->deletingCustomerId = $customerId;
    }


    public function render()
    {
        $customers = Customer::where('name','like','%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.customers', ['customers' => $customers]);
    }
}

