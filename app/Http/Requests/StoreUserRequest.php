<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|max:50|unique:users',
            'password' => 'required|min:8|max:255',
        ];
    }
}
