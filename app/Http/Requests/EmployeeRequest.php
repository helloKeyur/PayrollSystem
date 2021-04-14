<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->method() == 'PUT') 
        {
            $email_rules = "required|email|unique:employees,email,{$this->employee->id}"; 
            $phone_rules = "required|unique:employees,phone,{$this->employee->id}";
        }

        else 
        {
            $email_rules = "required|email|unique:employees";
            $phone_rules = "required|unique:employees";
        }
        return [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'gender'=>'required',
            'email'=> $email_rules,
            'phone'=>$phone_rules,
            'schedule_id'=>"required",
            'position_id'=>"required",
            'birthdate'=>"required",
        ];
    }

    public function messages()
    {
        return [
            'phone' => 'The :attribute field contains an invalid number.',
        ];
    }
}
