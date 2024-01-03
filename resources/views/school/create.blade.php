<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('School') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Add New School Name</h3>
                    <hr>
                    <form action="{{route('schools.store')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                School Name
                            </label>
                            <input name="name" value="{{old('name')}}" class="@error('name') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="school" type="text" placeholder="School Name">
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button class="text-white bg-blue-600  rounded text-sm px-5 py-2.5" type="submit">Add School</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
