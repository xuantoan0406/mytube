<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email' => 'required|email|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'nhập mail nào',
            'email.email' => 'k phải mail nhập lại nào',
            'email.unique' => 'mail đã tồn tại',
            'password.required' => 'nhập mk giùm cái'
        ];
    }
}
