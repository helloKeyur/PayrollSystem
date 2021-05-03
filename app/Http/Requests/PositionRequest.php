<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            $title_rules = "required|unique:positions,title,{$this->position->id}"; 
        }
        else 
        {
            $title_rules = "required|unique:positions";
        }
        return [
            'title' => $title_rules,
        ];
    }
}
