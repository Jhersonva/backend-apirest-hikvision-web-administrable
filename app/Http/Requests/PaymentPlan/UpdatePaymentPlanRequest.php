<?php

namespace App\Http\Requests\PaymentPlan;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon_img_payment_plan' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_plan' => 'sometimes|required|string|max:50',
            'price_plan' => 'sometimes|required|numeric|min:0',
            'list_plan' => 'nullable|array',
        ];
    }
}
