<?php

namespace App\Http\Requests\ImageCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:image_categories,name',
            'description' => 'nullable|string|max:255',
        ];
    }
}
