    <div class="content">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-start align-items-center">
                <div class="mb-2">
                    <form>
                        <x-text-input wire:model.live="search" type="search" placeholder="Search..." />
                    </form>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="mb-2" title="Add user">
                    <svg wire:click="toggleForm" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green"
                        class="bi bi-plus" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                </div>
            </div>
        </div>        
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barbers as $barber)
                
                <tr class="text-center">
                    <td>{{ $barber->id }}</td>
                    <td>{{ $barber->name }}</td>
                    <td>{{ $barber->email }}</td>
                    <td><button wire:click="edit({{ $barber->id }})" class="text-info me-4">Edit</button>
                        <button wire:click="destroy({{ $barber->id }})" class="text-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($BarberId)
        <div class="edit-form">
            <div class="form-floating mb-3">
                <input type="" wire:model="name" class="form-control" placeholder="Name">
                <label for="name">Name</label>
                @error('name')
                    <span class="text-danger text-xs">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <x-text-input type="email" wire:model="email" class="form-control" placeholder="name@example.com"/>
                <label for="email">Email address</label>
                @error('email')
                    <span class="text-danger text-xs">{{$message}}</span>
                @enderror
            </div>
            <button wire:click="update" class="btn btn-primary btn-sm">Edit</button>
            <button wire:click="cancelBox" class="btn btn-secondary btn-sm">Cancel</button>
        </div>
        @else
        @if($showform)
        <div class="create-form">
            <div class="form-floating mb-3">
                <input type="text" wire:model="name" class="form-control" placeholder="Name">
                <label for="name">Name</label>
                @error('name')
                    <span class="text-danger text-xs">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" wire:model="email" class="form-control" placeholder="name@example.com">
                <label for="Email">Email address</label>
                @error('email')
                    <span class="text-danger text-xs">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" wire:model="password" class="form-control" placeholder="name@example.com">
                <label for="passowrd">password</label>
                @error('password')
                    <span class="text-danger text-xs">{{$message}}</span>
                @enderror
            </div>
            <button wire:click="create" class="btn btn-success btn-sm">Create</button>
            <button wire:click="cancelBox" class="btn btn-secondary btn-sm">Cancel</button>
        </div>
        @endif
        @endif
        <div>
            {{$barbers -> links()}}
        </div>
    </div>
</div>
