<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'portfolio_category_id' => 'sometimes|exists:portfolio_categories,id',
            'img_portfolio'         => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name_portfolio'        => 'sometimes|string|max:150',
        ];
    }
}
