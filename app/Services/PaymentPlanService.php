<?php

namespace App\Services;

use App\Models\PaymentPlan;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PaymentPlanService
{
    public function getAll()
    {
        return PaymentPlan::all();
    }

    public function store(array $data): PaymentPlan
    {
        if (isset($data['icon_img_payment_plan']) && $data['icon_img_payment_plan'] instanceof UploadedFile) {
            $path = $data['icon_img_payment_plan']->store('payment_plans', 'public');
            $data['icon_img_payment_plan'] = $path;
        }

        return PaymentPlan::create($data);
    }

    public function update(int $id, array $data): PaymentPlan
    {
        $plan = PaymentPlan::findOrFail($id);

        if (isset($data['icon_img_payment_plan']) && $data['icon_img_payment_plan'] instanceof UploadedFile) {
            if ($plan->icon_img_payment_plan && Storage::disk('public')->exists($plan->icon_img_payment_plan)) {
                Storage::disk('public')->delete($plan->icon_img_payment_plan);
            }

            $path = $data['icon_img_payment_plan']->store('payment_plans', 'public');
            $data['icon_img_payment_plan'] = $path;
        }

        $plan->update($data);

        return $plan;
    }

    public function delete(int $id): bool
    {
        $plan = PaymentPlan::findOrFail($id);

        if ($plan->icon_img_payment_plan && Storage::disk('public')->exists($plan->icon_img_payment_plan)) {
            Storage::disk('public')->delete($plan->icon_img_payment_plan);
        }

        return $plan->delete();
    }
}
