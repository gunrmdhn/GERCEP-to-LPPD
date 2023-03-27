<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDinsosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'berkas' => 'mimes:xlsx',
            'bukti' => 'mimes:pdf',
        ];
    }
}
