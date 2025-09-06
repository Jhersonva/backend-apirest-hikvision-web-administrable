<?php

namespace App\Http\Controllers\Api\Servics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Servics\StoreServiceRequest;
use App\Http\Requests\Servics\UpdateServiceRequest;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    protected ServiceService $service;

    public function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return response()->json($data);
    }

    public function store(StoreServiceRequest $request): JsonResponse
    {
        $data = $request->validated();
        $service = $this->service->create($data);

        return response()->json($service, 201);
    }

    public function update(UpdateServiceRequest $request, Service $id): JsonResponse
    {
        $data = $request->validated();
        $id = $this->service->update($id, $data);

        return response()->json($id);
    }

    public function destroy(Service $id): JsonResponse
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Servicio eliminado correctamente']);
    }
}
