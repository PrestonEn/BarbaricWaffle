<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users|max:255|confirmed|email',
            'email_confirmation' => 'required'
            'pass' => 'required|min:6|confirmed'
            'pass_confirmation' => 'required'
            'phone' => 'required'
        ];
    }
}
