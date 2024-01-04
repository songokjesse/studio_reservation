<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('reservation.create');
    }

    public function store(ReservationStoreRequest $request): RedirectResponse
    {
        $user_id = Auth::id();
        $reservation = new Reservation([
            'user_id' => $user_id,
            'course_title' => $request->input('course_title'),
            'course_code' => $request->input('course_code'),
            'start_time' => $request->input('start_time'),
            'finish_time' => $request->input('finish_time', null), // Use null if 'end_time' is not set
            'comments' => $request->input('comments', null), // Use null if 'comments' is not set
        ]);
        $reservation->save();
        return redirect()->route('reservation.index')
            ->with('success', 'Reservation created successfully.');
    }
}
