<div>
    <div class="flex justify-between mb-4">
        <!-- Search bar on the left -->
        <div class="w-1/2">
            <x-input-label for="search" />
            <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="email" name="search" : placeholder="Search barbers..." />
        </div>

        <!-- Add button on the right -->
        <div>

        </div>
    </div>


    <div class="dark:bg-gray-800 p-4">
        <table class="min-w-full leading-normal">
            <thead>
            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    #ID
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Customer
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Barber
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    price
                </th>

                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    date
                </th>

                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Status
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->id}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->customer->name}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->barber->name}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->price}}</div>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->created_at->format('d M Y')}}</div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="flex">
                            <button wire:click="" class="text-blue-500 dark:text-blue-300 hover:text-blue-700 dark:hover:text-blue-500">
                                show
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{$payments->links()}}
        </div>
    </div>

</div>

