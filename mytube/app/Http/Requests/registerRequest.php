<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'email' => 'required|email|unique::User,email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'nhap lại tên',
            'email.required' => 'nhập lại mail đi',
            'email.unique' => 'mail đã tồn tại',
            'email.email' => 'k phải email',
            'password.required' => 'nhập mk giùm cái',
        ];
    }
}
