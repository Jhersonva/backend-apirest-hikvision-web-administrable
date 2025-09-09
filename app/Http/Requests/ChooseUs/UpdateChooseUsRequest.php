<?php

namespace App\Http\Requests\ChooseUs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChooseUsRequest extends FormRequest
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
            'note' => 'sometimes|string|max:50',
            'icon_img_choose_us' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'img_choose_us' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
