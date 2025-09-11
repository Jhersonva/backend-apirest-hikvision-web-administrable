<?php

namespace App\Http\Requests\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWhatIncludeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'item' => 'required|string|max:255',
        ];
    }
}