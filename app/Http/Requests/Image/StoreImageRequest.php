<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image_category_id' => 'required|exists:image_categories,id',
            'title' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ];
    }
}