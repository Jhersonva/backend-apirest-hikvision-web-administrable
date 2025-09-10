<?php

namespace App\Http\Requests\CategoryProduct;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_category_products' => 'required|string|max:250|unique:category_products,name_category_products',
        ];
    }
}
