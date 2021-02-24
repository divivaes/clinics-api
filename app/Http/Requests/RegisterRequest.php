<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        $rules['email'] = 'required|string|unique:users';
        $rules['fio'] = 'required|string|max:255';
        $rules['password'] = 'required|string|confirmed|min:4';

        return $rules;
    }
}
