<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SchoolController;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $schools = School::all();

    return view('welcome', compact('schools'));
})->name('homepage');


Route::post('/make_reservation', function (ReservationStoreRequest $request) {
    $user_id = 1;
    $reservation = new Reservation([
        'user_id' => $user_id,
        'school_id' => $request->input('school_id'),
        'staff_name' => $request->input('staff_name'),
        'staff_email' => $request->input('staff_email'),
        'staff_phone' => $request->input('staff_phone'),
        'course_title' => $request->input('course_title'),
        'course_code' => $request->input('course_code'),
        'reservation_date' => $request->input('reservation_date'),
        'start_time' => $request->input('start_time'),
        'finish_time' => $request->input('finish_time', null), // Use null if 'end_time' is not set
        'comments' => $request->input('comments', null), // Use null if 'comments' is not set
    ]);
    $reservation->save();
    return redirect()->route('homepage')->with('status', 'Reservation created successfully.');
})->name('make_reservation');


Route::get('/dashboard', function () {
    $events = [];
    $reservations = \App\Models\Reservation::all();
    foreach ($reservations as $reservation) {
        $events[] = [
            'title' => $reservation->course_title,
            'start' => $reservation->start_time,
            'end' => $reservation->finish_time,
        ];
    }

//    dd($events);
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/schools', SchoolController::class);
    //reservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
});

require __DIR__.'/auth.php';
