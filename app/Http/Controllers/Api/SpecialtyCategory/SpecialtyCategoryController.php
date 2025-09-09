<?php
namespace App\Http\Controllers\Api\SpecialtyCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyCategory\SpecialtyCategoryRequest;
use App\Services\SpecialtyCategory\SpecialtyCategoryService;
use Illuminate\Http\JsonResponse;

class SpecialtyCategoryController extends Controller
{
    protected SpecialtyCategoryService $service;

    public function __construct(SpecialtyCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(SpecialtyCategoryRequest $request): JsonResponse
    {
        $specialty = $this->service->create($request->validated());
        return response()->json($specialty, 201);
    }

    public function update(SpecialtyCategoryRequest $request, int $id): JsonResponse
    {
        $specialty = $this->service->update($id, $request->validated());
        return $specialty
            ? response()->json($specialty)
            : response()->json(['message' => 'Specialty not found'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->service->delete($id);
        return $deleted
            ? response()->json(['message' => 'Specialidad eliminada correctamente'])
            : response()->json(['message' => 'Specialty not found'], 404);
    }
}