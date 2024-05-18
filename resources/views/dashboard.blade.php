<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">

            <div id="app2" class="grid grid-cols-3 gap-4" >
                    <Dash   :month_now="{{ \Carbon\Carbon::now()->format('F') }}" 
                            :egg="{{ count($data[1]) >0 ? json_encode($data[1][0]) : null }}"
                            :w_egg="{{ count($data[9]) >0 ? json_encode($data[9]) : null }}"
                            :m_egg="{{ count($data[10]) >0 ? json_encode($data[10]) : null }}"
                    />
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
