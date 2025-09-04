<?php

namespace App\Http\Requests\ContactInformationCompany;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Si quieres protegerlo, mete lógica de roles aquí
    }

    public function rules(): array
    {
        return [
            'description_company' => ['nullable', 'string'],
            'address' => ['nullable', 'string', 'max:250'],
            'cell_phone_number' => ['nullable', 'string', 'max:15'],
            'email' => ['nullable', 'email', 'max:250'],
            'open_time' => ['nullable', 'string', 'max:100'],
            'company_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
