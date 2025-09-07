<?php

namespace App\Http\Requests\CounterService;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCounterServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'icon_img' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'counter' => 'sometimes|string|max:10',
            'name_counter_services' => 'sometimes|string|max:50',
        ];
    }
}
