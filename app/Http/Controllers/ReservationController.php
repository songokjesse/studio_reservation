<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\School;
use App\Services\ReservationValidatorService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    protected ReservationValidatorService $reservationValidationService;

    public function __construct(ReservationValidatorService $reservationValidationService)
    {
        $this->reservationValidationService = $reservationValidationService;
    }
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $schools = School::all();
        return view('reservation.create', compact('schools'));
    }

    public function store(ReservationStoreRequest $request): RedirectResponse
    {
//        // Check for overlapping reservations using the service
//        if (!$this->reservationValidationService->validateReservation($request)) {
//            return redirect()->back()->withErrors(['error' => 'Overlapping reservation'])->withInput();
//        }

        $user_id = Auth::id();
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
        return redirect()->route('reservation.index')
            ->with('success', 'Reservation created successfully.');
    }
}
