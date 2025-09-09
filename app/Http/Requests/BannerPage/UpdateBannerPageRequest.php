<?php

namespace App\Http\Requests\BannerPage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'main_title' => 'nullable|string|max:150',
            'img_banner_page' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
