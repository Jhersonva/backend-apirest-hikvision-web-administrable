<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarouselRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img_carousel' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'sub_titulo' => 'required|string|max:150',
            'main_title' => 'required|string|max:150',
            'descripcion' => 'required|string',
        ];
    }
}
