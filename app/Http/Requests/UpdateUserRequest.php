<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pengguna' => 'alpha_dash|unique:users,nama_pengguna,' . $this->id,
            'password' => 'min:8|confirmed|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'kata sandi',
        ];
    }
}
