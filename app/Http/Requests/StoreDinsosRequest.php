<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDinsosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'berkas' => 'required|mimes:xlsx',
            'bukti' => 'required|mimes:pdf',
        ];
    }
}
