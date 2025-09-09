<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name_partner' => 'sometimes|required|string|max:150',
            'img_partner'  => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
