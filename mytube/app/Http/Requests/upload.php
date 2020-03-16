<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class upload extends FormRequest
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
            'video' => 'mimes:mp4,mov,ogg | max:20000'
        ];
    }
}
