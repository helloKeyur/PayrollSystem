<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsTimeValid implements Rule
{
    public $time_out;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($time_out)
    {
        $this->time_out = $time_out;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value){
        $time_in = strtotime($value);
        $time_out = strtotime($this->time_out);

        if($time_out < $time_in){
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
        return 'Please check again time is not valid.';
    }
}
