<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Harvests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <br>
                <form class="max-w-md mx-auto" action="{{ route('harvests') }}" method="GET">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input name="date" value="{{ request()->input('date')}}" datepicker type="text" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by Date" />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                    <!-- <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div> -->
                </form>
                <br>
                <hr>
                <br>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-1 py-1">
                                    Batch #
                                </th>
                                <th scope="col" class="px-1 py-1">
                                    Egg Count
                                </th>
                                <th scope="col" class="px-1 py-1">
                                    Crack
                                </th>
                                <th scope="col" class="px-1 py-1">
                                    Date
                                </th>
                                <th scope="col" class="px-2 py-2">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                                $crack_sum = 0;
                            @endphp 
                            @foreach ($eggs as $egg)
                                @php
                                    $total = $egg->peewee_count + $egg->pullet_count + $egg->small_count;
                                    $sum += $total;
                                    $crack_sum += $egg->crack_count;
                                @endphp   

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $egg->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $total }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $egg->crack_count }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $egg->dateSimple() }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('harvest',array('id' => $egg->id) ) }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Total:
                                </th>
                                <td class="px-6 py-4">
                                    {{ $sum }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $crack_sum }}
                                </td>
                                <td class="px-6 py-4">
                                    
                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                        </tbody>

                        
                    </table>
                    <br>
                    {{ $eggs->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
