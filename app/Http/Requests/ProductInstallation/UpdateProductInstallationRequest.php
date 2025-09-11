<?php

namespace App\Http\Requests\ProductInstallation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductInstallationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description_product_installation' => 'nullable|string',
            'img_product_installation' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'what_includes' => 'nullable|array',
            'what_includes.*' => 'string',
        ];
    }
}