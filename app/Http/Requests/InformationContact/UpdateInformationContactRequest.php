<?php

namespace App\Http\Requests\InformationContact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'main_title' => 'sometimes|string|max:150',
            'description' => 'sometimes|string',
            'img_information_contact' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
