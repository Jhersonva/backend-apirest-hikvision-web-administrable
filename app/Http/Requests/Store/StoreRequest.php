<?php


namespace App\Http\Requests\Store;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_product_id' => 'nullable|exists:category_products,id',
            'product_id' => 'nullable|exists:products,id',
            'range_price_start' => 'required|integer|min:0',
            'range_price_end' => 'required|integer|min:0|gte:range_price_start',
            'img_store_discount' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'range_price_end.gte' => 'El rango final debe ser mayor o igual al rango inicial.',
        ];
    }
}
