<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsRequest extends FormRequest
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

            'number'=>'required|digits:10|starts_with:04',
            'message'=>'required'
            //
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'number.digits' => 'Please enter a correct Aus Mobile Number that has 10 digits and starting with 04',
            'number.starts_with' => 'Please enter a correct Aus Mobile Number that has 10 digits and starting with 04',
        ];
    }

}
