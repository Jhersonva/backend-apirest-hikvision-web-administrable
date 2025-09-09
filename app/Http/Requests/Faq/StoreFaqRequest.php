<?php

namespace App\Http\Requests\Faq;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // O validar roles si usas auth
    }

    public function rules(): array
    {
        return [
            'question' => 'required|string|max:250',
            'response' => 'required|string',
        ];
    }
}
