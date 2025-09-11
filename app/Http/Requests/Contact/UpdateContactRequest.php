<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'main_title' => 'required|string|max:150',
            'main_description' => 'required|string',
            'latitud_map' => 'nullable|string',
            'longitud_map' => 'nullable|string',
        ];
    }
}