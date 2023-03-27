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
            'nama_pengguna' => 'required|alpha_dash|unique:users,nama_pengguna',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'kata sandi',
        ];
    }
}
