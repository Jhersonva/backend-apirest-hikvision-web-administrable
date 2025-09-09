<?php
namespace App\Http\Controllers\Api\SectionTitle;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionTitle\SectionTitleRequest;
use App\Services\SectionTitle\SectionTitleService;
use Illuminate\Http\JsonResponse;

class SectionTitleController extends Controller
{
    protected SectionTitleService $service;

    public function __construct(SectionTitleService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function show(int $id): JsonResponse
    {
        $section = $this->service->getById($id);
        return $section
            ? response()->json($section)
            : response()->json(['message' => 'Section not found'], 404);
    }

    public function store(SectionTitleRequest $request): JsonResponse
    {
        $section = $this->service->create($request->validated());
        return response()->json($section, 201);
    }

    public function update(SectionTitleRequest $request, int $id): JsonResponse
    {
        $section = $this->service->update($id, $request->validated());
        return $section
            ? response()->json($section)
            : response()->json(['message' => 'Section not found'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->service->delete($id);
        return $deleted
            ? response()->json(['message' => 'Section eliminada correctamente'])
            : response()->json(['message' => 'Section not found'], 404);
    }
}
