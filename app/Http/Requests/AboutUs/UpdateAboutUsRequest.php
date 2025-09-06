<?php

namespace App\Http\Requests\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'main_title' => 'nullable|string|max:150',
            'description' => 'nullable|string',
            'experience' => 'nullable|string|max:50',
            'number_about_us' => 'nullable|string|max:15',
            'img_about' => 'nullable|image|max:2048',
        ];
    }
}
