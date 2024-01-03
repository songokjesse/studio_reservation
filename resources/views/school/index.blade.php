<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schools') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                   <a href="{{route('schools.create')}}"> <button class="text-white bg-red-900  rounded text-sm px-5 py-2.5" > Add School </button></a>


                                    <table class="divide-y divide-gray-300 w-full border mt-4">
                                        <thead class="bg-green-900 text-white">
                                        <tr>
                                            <th class="px-6 py-2 text-xs text-gray-500">#</th>
                                            <th>Name</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">
                                        @foreach($schools as $school)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4 text-sm text-gray-500">{{$loop->iteration}}</td>
                                            <td>{{$school->name}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                </div>
            </div>
</x-app-layout>
