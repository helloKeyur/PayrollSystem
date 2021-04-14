<?php

namespace App\Rules;

use App\Employee;
use Illuminate\Contracts\Validation\Rule;

class EmployeeValidity implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employee = Employee::where('id',$value)->orWhere("employee_id",$value)->first();
        if($employee){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Employee is not exist.';
    }
}
