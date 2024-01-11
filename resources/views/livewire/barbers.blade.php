<div>
    @if(session()->has('message'))
        <p x-data="{ show: true }"
           x-show="show"
           x-transition
           x-init="setTimeout(() => show = false, 4000)"
           class="text-sm text-orange-600 dark:text-orange-400"
        >
            {{ session('message') }}
        </p>
    @endif

    <div class="flex justify-between mb-4">
        <!-- Search bar on the left -->
        <div class="w-1/2">
            <x-input-label for="search" />
            <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="email" name="search" : placeholder="Search barbers..." />
        </div>

        <!-- Add button on the right -->
        <div>
            <button wire:click="toggleForm" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                Add Barber
            </button>
        </div>
    </div>

    @if($showForm)
        <form wire:submit.prevent="create" class="mb-4 p-4 rounded shadow-lg">
            <div class="mb-4">
                <label class="block  text-sm font-bold mb-2" for="name">Name</label>
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" : placeholder="Name barber..." />
                @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block  text-sm font-bold mb-2" for="phone">phone</label>
                <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone" : placeholder="phone barber..." />
                @error('phone') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block  text-sm font-bold mb-2" for="name">email</label>
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" : placeholder="email barber..." />
                @error('email') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>
            <!-- Similar blocks for 'email' and 'phone' -->

            <!-- Submit button -->
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Save Barber
            </button>
            <button wire:click="cancelBox" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Cancel
            </button>
        </form>
    @endif



    <div class="dark:bg-gray-800 p-4">
        <table class="min-w-full leading-normal">
            <thead>
            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    #ID
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Name
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Email
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Phone
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($barbers as $barber)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$barber->id}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$barber->name}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$barber->email}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$barber->phone}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="flex">
                            <button wire:click="edit({{ $barber->id }})" class="text-blue-500 dark:text-blue-300 hover:text-blue-700 dark:hover:text-blue-500 mr-2">
                                Edit
                            </button>
                            <button wire:click="confirmDeletion({{ $barber->id }})" class="text-red-500 dark:text-red-300 hover:text-red-700 dark:hover:text-red-500">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{$barbers->links()}}
        </div>
    </div>

        @if($BarberId)
            <form wire:submit.prevent="update" class="mb-4 p-4 rounded shadow-lg">
                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" for="name">Name</label>
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" value="{{$this->name}}" placeholder="Name barber..." />
                    @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" for="phone">PHone</label>
                    <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{$this->phone}}" placeholder="phone barber..." />
                    @error('phone') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" for="name">Name</label>
                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" value="{{$this->email}}" placeholder="email barber..." />
                    @error('email') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                </div>
                <!-- Similar blocks for 'email' and 'phone' -->

                <!-- Submit button -->
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Save Barber
                </button>
                <button wire:click="cancelBox" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </button>
            </form>
        @endif


        @if($deletingBarberId)
            <div class="fixed inset-0 bg-gray-700 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-orange-200">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Confirm Deletion
                        </h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this Customer? This action cannot be undone.
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button wire:click="destroy({{ $deletingBarberId }})" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-5/12 shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Delete
                            </button>
                            <button wire:click="$set('deletingBarberId', null)" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-5/12 shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
</div>

