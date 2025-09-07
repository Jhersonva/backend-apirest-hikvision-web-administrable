<?php

namespace App\Http\Controllers\Api\InformationContact;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationContact\UpdateInformationContactRequest;
use App\Services\InformationContactService;
use Illuminate\Http\JsonResponse;

class InformationContactController extends Controller
{
    protected InformationContactService $service;

    public function __construct(InformationContactService $service)
    {
        $this->service = $service;
    }

      // GET → obtener la info
    public function getInfo(): JsonResponse
    {
        $info = $this->service->getInfo();
        return response()->json($info);
    }

    // PUT → actualizar
    public function update(UpdateInformationContactRequest $request): JsonResponse
    {
        $info = $this->service->updateInfo($request->validated());
        return response()->json([
            'message' => 'Información actualizada correctamente',
            'data' => $info,
        ]);
    }
}
