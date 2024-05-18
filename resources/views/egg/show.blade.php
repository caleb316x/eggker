<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Harvest') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
            <a type="button" href="{{route('harvests')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
            <br>
            <br>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                    <div class="grid gap-4">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-dark">Date: {{$data[0]->dateSimple()}}</h5>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-dark">Total Eggs: {{$data[2]}}</h5>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Egg Type
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Count
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Peewee
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][0] }}
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Pullet
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][1] }}
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Small
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][2] }}
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Medium
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][3] }}
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Large
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][4] }}
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Extra Large
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][5] }}
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Jumbo
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][6] }}
                                        </td>
                                    </tr>
                                    <!-- <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Crack
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $data[1][7] }}
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="app">
                    <!-- <div class="chartelem"> -->
                        <Harvestpie :egg="{{json_encode($data[1])}}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
