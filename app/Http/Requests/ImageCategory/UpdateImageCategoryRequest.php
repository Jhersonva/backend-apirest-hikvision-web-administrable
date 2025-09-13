<?php

namespace App\Http\Requests\ImageCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambia si usas auth
    }

    public function rules(): array
    {
        $id = $this->route('id'); // Para excluir el ID en la validación unique

        return [
            'name' => 'required|string|max:100|unique:image_categories,name,' . $id,
            'description' => 'nullable|string|max:255',
        ];
    }
}
