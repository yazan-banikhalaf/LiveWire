<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;



class Users extends Component
{
    public $search='';

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
        $this->resetFields();
    }
    public function cancelBox()
    {
        $this->showform = false;
        $this->resetFields();

    }
    public function index()
    {
        return view('dashboard');
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
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has already been taken.',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

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
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
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
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(10);
            return view('livewire.users',['users' => $users]);
    }
}
