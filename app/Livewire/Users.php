<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users; 
    public $showform=false;
    public $UserId;
    public $name;
    public $email;
    public $password;
    
    public function resetFields()
    {
        $this->UserId = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function toggleForm()
    {
        $this->showform = true;
        $this->UserId = '';
        $this->resetFields();
    }
    public function cancelBox()
    {
        $this->showform = false;
        $this->UserId = '';
        $this->name = '';
        $this->email = '';
    }
    public function index()
    {
        return view('dashboard');
    } 

    public function mount()
    {
        $this->users = User::all();
    }
    public function editUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->UserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;

    }
    public function updateUser()
    {
        $user = User::findOrFail($this->UserId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        session()->flash('message', 'User updated successfully!');
        return redirect('/dashboard');
    }
    public function CreateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        session()->flash('message', 'User created successfully!');
        $this->cancelBox();
        return redirect('/dashboard');
    }

    public function destroyUser($UserId)
    {
        $user = User::find($UserId);
        $user->delete();
        session()->flash('message', 'User deleted successfully!');
        return redirect('/dashboard');
        
    }      
    public function render()
    {
        return view('livewire.users');
    }
}
