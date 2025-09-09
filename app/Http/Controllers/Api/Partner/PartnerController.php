<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;
use App\Models\Partner;
use App\Services\Partner\PartnerService;
use Illuminate\Http\JsonResponse;

class PartnerController extends Controller
{
    protected PartnerService $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    // GET → listar todos los partners
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    // POST → crear un partner
    public function store(StorePartnerRequest $request): JsonResponse
    {
        try {
            $partner = $this->service->create($request->validated());
            return response()->json($partner, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // PUT → actualizar partner
    public function update(UpdatePartnerRequest $request, int $id): JsonResponse
    {
        $partner = Partner::findOrFail($id);

        try {
            $partner = $this->service->update($partner, $request->validated());
            return response()->json($partner);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // DELETE → eliminar partner
    public function destroy(int $id): JsonResponse
    {
        $partner = Partner::findOrFail($id);
        $this->service->delete($partner);

        return response()->json(['message' => 'Partner eliminado correctamente']);
    }
}