<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SchoolController;
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
    return view('welcome');
});

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
