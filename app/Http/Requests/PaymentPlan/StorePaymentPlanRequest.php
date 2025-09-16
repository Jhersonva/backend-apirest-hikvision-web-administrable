<?php

namespace App\Http\Requests\PaymentPlan;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon_img_payment_plan' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name_plan' => 'required|string|max:50',
            'price_plan' => 'required|numeric|min:0',
            'list_plan' => 'nullable|array',
        ];
    }
}
