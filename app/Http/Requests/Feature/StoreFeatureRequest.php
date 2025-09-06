<?php

namespace App\Http\Requests\Feature;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon_img_feature' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name_feature' => 'required|string|max:50',
            'description' => 'required|string',
        ];
    }
}
