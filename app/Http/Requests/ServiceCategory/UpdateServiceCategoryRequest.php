<?php

namespace App\Http\Requests\ServiceCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon_service_category'     => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'titulo_service_category'   => 'sometimes|string|max:100',
            'description_service_category' => 'sometimes|string',
        ];
    }
}
