<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">

            <div class="grid grid-cols-3 gap-4">
                
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Today's Harvest <br>({{ $data[2] == null ? \Carbon\Carbon::now()->format('F d') : $data[1][0]->created_at->format('F d, Y h:i a') }})</h5>
                    </a>
                    @if ($data[2] == null)
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">No eggs were harvested today</p>
                    @else
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Peewee: <span class="font-bold">{{$data[1][0]->peewee_count}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pullet: <span class="font-bold">{{$data[1][0]->pullet_count}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Small: <span class="font-bold">{{$data[1][0]->small_count}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Medium: <span class="font-bold">{{$data[1][0]->medium_count}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Large: <span class="font-bold">{{$data[1][0]->large_count}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Extra Large: <span class="font-bold">{{$data[1][0]->extra_large_count}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jumbo: <span class="font-bold">{{$data[1][0]->jumbo_count}}</span></p>
                        <hr>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Eggs: <span class="font-bold">{{$data[2]}}</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Crack Eggs: <span class="font-bold">{{$data[1][0]->crack_count}}</span></p>
                    @endif
                    
                </div>

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Weekly Harvest</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Peewee: <span class="font-bold">{{$data[9][0]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pullet: <span class="font-bold">{{$data[9][1]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Small: <span class="font-bold">{{$data[9][2]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Medium: <span class="font-bold">{{$data[9][3]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Large: <span class="font-bold">{{$data[9][4]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Extra Large: <span class="font-bold">{{$data[9][5]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jumbo: <span class="font-bold">{{$data[9][6]}}</span></p>
                    <hr>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Eggs: <span class="font-bold">{{$data[4]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Crack Eggs: <span class="font-bold">{{$data[5]}}</span></p>
                </div>

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Monthly Harvest ({{ \Carbon\Carbon::now()->format('F') }})</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Peewee: <span class="font-bold">{{$data[10][0]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pullet: <span class="font-bold">{{$data[10][1]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Small: <span class="font-bold">{{$data[10][2]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Medium: <span class="font-bold">{{$data[10][3]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Large: <span class="font-bold">{{$data[10][4]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Extra Large: <span class="font-bold">{{$data[10][5]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jumbo: <span class="font-bold">{{$data[10][6]}}</span></p>
                    <hr>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Eggs: <span class="font-bold">{{$data[7]}}</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Crack Eggs: <span class="font-bold">{{$data[8]}}</span></p>
                </div>

            </div>

            


                <br>
                <hr>
                <div id="app">
                    <br>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-dark">Harvest Weekly</h5>
                    <Chartjs :eggs="{{ json_encode($data[3]) }}" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
