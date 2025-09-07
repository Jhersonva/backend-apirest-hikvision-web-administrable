<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'main_title'            => 'required|string|max:150',
            'img_portfolio'         => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name_portfolio'        => 'required|string|max:150',
        ];
    }
}
