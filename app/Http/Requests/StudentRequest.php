<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'father_name' =>  'required',
            'phone' => 'required|regex:/^[0-9]/',
            'photo' => 'image|mime:jpg,jpeg,png',
            'class_study'=>'required'
        ];
    }

    public function messages()
    {
        return [            
            'required' => 'A :attribute please fill  is required',            
            'phone.regex' => 'Phone number only contain number',
            'mimes'=>'image type must be in :values',
        ];
    }
}
