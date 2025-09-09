<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name_partner' => 'required|string|max:150',
            'img_partner'  => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
