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
            'course_title' => 'required|max:255',
            'course_code' => 'required|max:255',
            'comments' => 'nullable',
            'start_time' => 'required|date',
            'finish_time' => 'nullable|required|date|after:start_time'
        ];
    }
}
