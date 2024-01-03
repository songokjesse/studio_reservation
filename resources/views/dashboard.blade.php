<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        <a href="#"  class="text-white bg-green-900  rounded text-sm px-5 py-2.5">Make Reservation</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js "></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    slotMinTime: '8:00:00',
                    slotMaxTime: '17:30:00',
                    weekends: false
                    {{--events: @json($events),--}}
                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>
