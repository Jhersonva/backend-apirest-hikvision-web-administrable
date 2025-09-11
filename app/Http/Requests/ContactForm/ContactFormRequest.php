<?php

namespace App\Http\Requests\ContactForm;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:250',
            'affair' => 'required|string',
            'message' => 'required|string',
        ];
    }
}