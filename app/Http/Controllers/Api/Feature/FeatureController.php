<?php

namespace App\Http\Controllers\Api\Feature;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feature\StoreFeatureRequest;
use App\Http\Requests\Feature\UpdateFeatureRequest;
use App\Models\Feature;
use App\Services\FeatureService;
use Illuminate\Http\JsonResponse;

class FeatureController extends Controller
{
    protected FeatureService $service;

    public function __construct(FeatureService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreFeatureRequest $request): JsonResponse
    {
        $feature = $this->service->create($request->validated());
        return response()->json($feature, 201);
    }

    public function update(UpdateFeatureRequest $request, Feature $feature): JsonResponse
    {
        $updated = $this->service->update($feature, $request->validated());
        return response()->json($updated);
    }

    public function destroy(Feature $feature): JsonResponse
    {
        $this->service->delete($feature);
        return response()->json(['message' => 'Feature eliminada correctamente']);
    }
}
