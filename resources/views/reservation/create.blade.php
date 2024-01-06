<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservations') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{route('reservation.index')}}"> <button class="text-white bg-red-900  rounded text-sm px-5 py-2.5" >Back </button></a>
                    <form action="{{route('reservation.store')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="course_title">
                                Course Name
                            </label>
                            <input name="course_title" value="{{old('course_title')}}" class="@error('course_title') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="course_title" type="text" placeholder="Course Name">
                            @error('course_title')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="course_code">
                                Course Code
                            </label>
                            <input name="course_code" value="{{old('course_code')}}" class="@error('course_code') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="course_code" type="text" placeholder="Course Code">
                            @error('course_code')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="start_time">
                                Start Time
                            </label>
                            <input name="start_time" min="{{date('Y-m-d')}}" value="{{old('start_time')}}" class="@error('start_time') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start_time" type="datetime-local" placeholder="Start Time">
                            @error('start_time')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="end_time">
                                Finish Time
                            </label>
                            <input name="finish_time" value="{{old('finish_time')}}" class="@error('finish_time') border-red-500 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end_time" type="datetime-local" placeholder="Finish Time">
                            @error('finish_time')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="comments">
                                Comments
                            </label>
                            <textarea name="comments" class="@error('comments') border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="comments" placeholder="Comments"></textarea>
                            @error('comments')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mt-3">
                            <button class="text-white bg-blue-600  rounded text-sm px-5 py-2.5" type="submit">Make Reservation</button>
                        </div>
                    </form>


                </div>
            </div>


        </div>
    </div>
</x-app-layout>
