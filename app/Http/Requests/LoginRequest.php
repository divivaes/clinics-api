<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        $rules['email'] = 'required|string|exists:users,email';
        $rules['password'] = 'required|string';

        return $rules;
    }
}
