<div>
    <div class="flex justify-between mb-4">
        <!-- Search bar on the left -->
        <div class="w-1/2">
            <x-input-label for="search" />
            <x-text-input wire:model="search" id="search" class="block mt-1 w-full" type="email" name="email" : placeholder="Search barbers..." />
        </div>

        <!-- Add button on the right -->
        <div>
            <button wire:click="toggleForm" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                Add Barber
            </button>
        </div>
    </div>

    @if($showForm)
        <form wire:submit.prevent="create" class="mb-4 p-4 rounded shadow-lg bg-white">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input wire:model="name" type="text" placeholder="Enter name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
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
                        <div class="text-gray-900 dark:text-gray-300">1</div>
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
                            <button class="text-blue-500 dark:text-blue-300 hover:text-blue-700 dark:hover:text-blue-500 mr-2">
                                Edit
                            </button>
                            <button class="text-red-500 dark:text-red-300 hover:text-red-700 dark:hover:text-red-500">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

