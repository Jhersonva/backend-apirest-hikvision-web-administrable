<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_product_id' => 'required|exists:category_products,id',
            'img_product' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name_product' => 'required|string|max:255',
            'state_offer' => 'required|in:true,false',
            'not_offer_price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0|required_if:state_offer,true',
            'star_quality' => 'required|integer|min:1|max:5',
        ];
    }
}
