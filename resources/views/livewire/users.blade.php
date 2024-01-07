<div>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-center">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><button wire:click="editUser({{ $user->id }})" class="text-info me-4">Edit</button>
                    <button wire:click="destroyUser({{ $user->id }})" class="text-danger">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($UserId)
    <div class="edit-form">
        <div class="form-floating mb-3">
            <input type="text" wire:model="name" class="form-control" placeholder="Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" wire:model="email" class="form-control" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <button wire:click="updateUser" class="btn btn-primary btn-sm">Update</button>
        <button wire:click="cancelBox" class="btn btn-secondary btn-sm">Cancel</button>
    </div>
    @endif

    
    @if (session()->has('message'))
    <div class="container mt-4">
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    </div>
    @endif
</div>
