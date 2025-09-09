<?php

namespace App\Http\Requests\Servics;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_category_id'    => 'sometimes|exists:service_categories,id',
            'icon_service'           => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name_services'          => 'sometimes|string|max:100',
            'description_services'   => 'sometimes|string',
        ];
    }
}
