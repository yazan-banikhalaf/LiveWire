<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        <!-- Barber Card -->
        <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4 flex flex-col items-center justify-center">
            <div class="text-lg font-semibold">Barbers</div>
            <div class="text-2xl font-bold text-orange-400">{{$data['barber']}}</div>
        </div>

        <!-- Payment Total Card -->
        <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4 flex flex-col items-center justify-center">
            <div class="text-lg font-semibold">Payment Total</div>
            <div class="text-2xl font-bold text-orange-500">0 JD</div>
        </div>

        <!-- Payment Details Card -->
        <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md  rounded-lg p-4 flex flex-col items-center justify-center">
            <div class="text-lg font-semibold">Payment Details</div>
            <div class="text-2xl font-bold text-orange-600">0 JD</div>
        </div>

        <!-- Customer Card -->
        <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4 flex flex-col items-center justify-center">
            <div class="text-lg font-semibold">Customers</div>
            <div class="text-2xl font-bold text-orange-700">{{$data['customer']}}</div>
        </div>
    </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:create-payment />
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4 p-4">
            <!-- Total Payments Per Barber Today (Left) -->
            <div class="w-full md:w-1/2 dark:bg-gray-800 dark:text-gray-200 bg-white shadow rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-3">Total Payments Per Barber Today</h3>
                <ul class="divide-y divide-gray-200">
                    @foreach($totalsPerBarberToday as $total)
                        <li class="py-2">
                            <span class="font-semibold">{{ $total['barber_name'] }}:</span>
                            <span>{{ $total['total_price'] }} JD</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Latest Payments (Right) -->
            <div class="w-full md:w-1/2 dark:bg-gray-800 dark:text-gray-200 bg-white shadow rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-3">Latest Payments</h3>
                <ul class="divide-y divide-gray-200">
                    @foreach($payments as $payment)
                        <li class="py-2">
                            <span>{{ $payment->customer->name }}</span> -
                            <span>{{ $payment->price }} JD</span> -
                            <span>{{ $payment->created_at->format('M d, Y') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
