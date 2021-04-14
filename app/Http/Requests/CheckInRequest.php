<?php

namespace App\Http\Requests;

use App\Rules\{AttendanceForAday,EmployeeValidity};
use Illuminate\Foundation\Http\FormRequest;

class CheckInRequest extends FormRequest
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

    public function rules(){
        if ($this->method() == 'PUT'){
            $date_rule = "required"; 
            $time_in_rule = ['required_without:time_out'];
        }else{
            $date_rule = ['required',new AttendanceForAday($this->employee_id)];
            $time_in_rule = ['required_without:time_out'];
        }
        return [
            'employee_id' => ["required",new EmployeeValidity()],
            'date' => $date_rule,
            'time_in' => $time_in_rule,
            'time_out' => 'required_without:time_in',
        ];
    }
}
