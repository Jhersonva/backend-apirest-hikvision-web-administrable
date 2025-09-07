<?php

namespace App\Http\Requests\PortfolioCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_portfolio_category' => 'sometimes|string|max:100',
        ];
    }
}
