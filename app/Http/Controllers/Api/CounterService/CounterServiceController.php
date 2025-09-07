<?php

namespace App\Http\Controllers\Api\CounterService;

use App\Http\Controllers\Controller;
use App\Http\Requests\CounterService\UpdateCounterServiceRequest;
use App\Services\CounterServiceService;
use Illuminate\Http\JsonResponse;

class CounterServiceController extends Controller
{
    protected CounterServiceService $service;

    public function __construct(CounterServiceService $service)
    {
        $this->service = $service;
    }

    // GET → traer todos
    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return response()->json($data);
    }

    // PUT → actualizar uno por ID
    public function update(UpdateCounterServiceRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $counter = $this->service->updateInfo($id, $data);

        return response()->json($counter);
    }
}
