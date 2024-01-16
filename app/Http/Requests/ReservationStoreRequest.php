<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'school_id' => 'required',
            'staff_name' => 'required|max:255',
            'staff_email' => 'required|max:255',
            'staff_phone' => 'required|max:255',
            'course_title' => 'required|max:255',
            'course_code' => 'required|max:255',
            'comments' => 'nullable',
            'reservation_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'finish_time' => 'nullable|required|date_format:H:i|after:start_time'
        ];
    }
}
