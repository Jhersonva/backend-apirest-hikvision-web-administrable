<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarouselRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img_carousel' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'sub_titulo' => 'sometimes|string|max:150',
            'main_title' => 'sometimes|string|max:150',
            'descripcion' => 'sometimes|string',
        ];
    }
}
