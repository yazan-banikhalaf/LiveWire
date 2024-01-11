<?php

namespace App\Livewire;

use App\Models\Barber;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Barbers extends Component
{
    public $search = '';
    public $BarberId;
    public $showForm = false;
    public $name;
    public $email;
    public $phone;

    public $deletingBarberId = null;



    public function resetFields()
    {
        $this->BarberId = '';
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
            'email' => 'nullable|email|unique:barbers,email',
            'phone' => 'required|unique:barbers,phone',
        ]);
        Barber::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);
        session()->flash('message', 'Barber created successfully!');
        $this->cancelBox();
        return redirect('barbers');
    }
    public function edit($barberId)
    {
        $barber = Barber::findOrFail($barberId);
        $this->BarberId = $barber->id;
        $this->name = $barber->name;
        $this->email = $barber->email;
        $this->phone = $barber->phone;

    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => ['nullable', 'email', Rule::unique('barbers', 'email')->ignore($this->BarberId)],
            'phone' => ['required', Rule::unique('barbers', 'phone')->ignore($this->BarberId)],

        ]);
        $barber = Barber::findOrFail($this->BarberId);
        $barber->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        session()->flash('message', 'Barber updated successfully!');
        return redirect('/barbers');
    }
    public function destroy($id)
    {
        Barber::findorfail($id)->delete();
        session()->flash('message', 'User deleted successfully!');
     $this->deletingBarberId = null;
        return redirect('/barbers');
    }

    public function confirmDeletion($barberId)
    {
        $this->deletingBarberId = $barberId;
    }
    public function render()
    {
        $barbers = Barber::where('name','like','%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.barbers', ['barbers' => $barbers]);
    }
}
