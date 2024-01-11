<div>
    <div class="flex justify-between mb-4">
        <!-- Search bar on the left -->
        <div class="w-1/2">
            <x-input-label for="search" value="search"/>
            <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="email" name="search" : placeholder="Search barbers..." />
        </div>

        <!-- Add button on the right -->
        <div class="flex gap-1">
            <div>
                <label class="block  text-sm font-bold mb-2" for="barber">Barbe</label>
                <select id="barber" wire:model.live="barberFilter" class="block capitalize mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value=""></option>
                    @foreach($barbers as $barber)
                        <option value="{{$barber->id}}">{{$barber->name}}</option>
                    @endforeach
                </select>
                @error('barber') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div>
                <label class="block  text-sm font-bold mb-2" for="status">Status</label>
                <select id="status" wire:model.live="statusFilter" class="block capitalize mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value=""></option>
                    @foreach(['paid' , 'waiting'] as $status)
                        <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div>
                <label class="block  text-sm font-bold mb-2" for="date">Date</label>
                <select id="date" wire:model.live="dateFilter" class="block capitalize mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value=""></option>
                    @foreach(['today' , 'this_month'] as $date)
                        <option value="{{$date}}">{{$date}}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div>
                <label class="block  text-sm font-bold mb-2" for="date">Type</label>
                <select id="type" wire:model.live="typeFilter" class="block capitalize mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value=""></option>
                    @foreach(['cash' , 'qlik'] as $type)
                        <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div>
                <label class="block  text-sm font-bold mb-2" for="details">has details</label>
                <select id="details" wire:model.live="detailsFilter" class="block capitalize mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value=""></option>

                    <option value="true">yes</option>

                </select>
                @error('details') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>
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

                <th class="px-5 py-3 border-b-2 border-gray-200 text-gray-800 dark:text-gray-300 text-left text-sm uppercase font-normal">
                    Action
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
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->price}}
                            @if(!empty($payment->details->price))
                                <span class="text-orange-300 text-sm">  + {{$payment->details->price ?? ''}} </span></div>
                           @endif
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="text-gray-900 dark:text-gray-300">{{$payment->created_at->format('d M Y')}}</div>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="inline-flex items-center justify-center px-2 py-1 rounded-full {{ $payment->status == 'paid' ? 'text-green-300 dark:text-green-200 bg-green-700' : 'text-red-300 dark:text-red-200 bg-red-700' }}">{{$payment->status}}</div>
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

