<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationValidatorService
{
    public function validateReservation($request): bool
    {
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('finish_time'));

        // Check if there is any overlapping reservation for the given time
        $overlappingReservation = Reservation::where(function ($query) use ($startTime, $endTime) {
            $query->where(function ($query) use ($startTime, $endTime) {
                $query->where('start_time', '>=', $startTime)
                    ->where('start_time', '<', $endTime);
            })
                ->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('finish_time', '>', $startTime)
                        ->where('finish_time', '<=', $endTime);
                })
                ->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '<', $startTime)
                        ->where('finish_time', '>', $endTime);
                });
        })
            ->first();

        return !$overlappingReservation;
    }

}
