<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_product_id' => 'sometimes|exists:category_products,id',
            'img_product' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name_product' => 'sometimes|string|max:255',
            'state_offer' => 'sometimes|in:true,false',
            'not_offer_price' => 'sometimes|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0|required_if:state_offer,true',
            'star_quality' => 'sometimes|integer|min:1|max:5',
        ];
    }
}