<?php

namespace App\Http\Requests\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description_product_detail' => 'required|string',
            'img_product_detail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'what_includes' => 'nullable|array',
            'what_includes.*' => 'string|max:255',
        ];
    }
}
