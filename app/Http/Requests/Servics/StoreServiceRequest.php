<?php

namespace App\Http\Requests\Servics;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_category_id'    => 'required|exists:service_categories,id',
            'icon_service'           => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name_services'          => 'required|string|max:100',
            'description_services'   => 'required|string',
        ];
    }
}
