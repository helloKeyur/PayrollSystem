<?php

namespace App\Http\Requests;

use App\Rules\IsTimeValid;
use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'time_in' => ['required',new IsTimeValid($this->time_out)],
            'time_out' => "required",
        ];
    }

    public function attributes()
    {
        return [
            'time_in' => 'Time-In',
            'time_out' => 'Time-Out',
        ];
    }
}
