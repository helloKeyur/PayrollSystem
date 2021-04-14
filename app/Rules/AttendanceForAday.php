<?php

namespace App\Rules;

use App\{Attendance,Employee};
use Illuminate\Contracts\Validation\Rule;

class AttendanceForAday implements Rule
{
    public $employee_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $emp_id = Employee::where("id",$this->employee_id)->orWhere("employee_id",$this->employee_id)->first()->id;
        $check = Attendance::where([
            "employee_id"=>$emp_id,
            "date" => date("Y-m-d",strtotime($value))
            ])->first();
        if($check){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Attendance is already added in given date.';
    }
}
