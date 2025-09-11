<?php

namespace App\Http\Requests\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description_product_detail' => 'sometimes|string',
            'img_product_detail' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'what_includes' => 'sometimes|array',
            'what_includes.*' => 'string|max:255',
        ];
    }
}