<?php

namespace App\Http\Controllers\Api\PaymentPlan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentPlan\StorePaymentPlanRequest;
use App\Http\Requests\PaymentPlan\UpdatePaymentPlanRequest;
use App\Services\PaymentPlanService;
use Illuminate\Http\JsonResponse;

class PaymentPlanController extends Controller
{
    protected PaymentPlanService $service;

    public function __construct(PaymentPlanService $service)
    {
        $this->service = $service;
    }

    // GET → todos
    public function index(): JsonResponse
    {
        $plans = $this->service->getAll();
        return response()->json($plans);
    }

    // POST → crear
    public function store(StorePaymentPlanRequest $request): JsonResponse
    {
        $data = $request->validated();
        $plan = $this->service->store($data);

        return response()->json($plan, 201);
    }

    // PUT → actualizar
    public function update(UpdatePaymentPlanRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $plan = $this->service->update($id, $data);

        return response()->json($plan);
    }

    // DELETE → eliminar
    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Payment plan deleted successfully']);
    }
}
