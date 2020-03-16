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
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'CfPassword' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'nhap lại tên',
            'name.unique' => 'tên có ng dùng r b êy',
            'email.required' => 'nhập lại mail đi',
            'email.unique' => 'mail đã tồn tại',
            'email.email' => 'k phải email',
            'password.required' => 'nhập mk giùm cái',
            'CfPassword.same' => "mk k trùng r",
            'CfPassword.required' => 'xác thực mk đi'
        ];
    }
}
