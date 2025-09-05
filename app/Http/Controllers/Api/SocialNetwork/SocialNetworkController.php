<?php

namespace App\Http\Controllers\Api\SocialNetwork;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetWork\StoreSocialNetworkRequest;
use App\Http\Requests\SocialNetWork\UpdateSocialNetworkRequest;
use App\Models\SocialNetwork;
use App\Services\SocialNetworkService;
use Illuminate\Http\JsonResponse;

class SocialNetworkController extends Controller
{
    protected $service;

    public function __construct(SocialNetworkService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $socialNetworks = $this->service->getAll();
        return response()->json($socialNetworks);
    }

    public function store(StoreSocialNetworkRequest $request): JsonResponse
    {
        $socialNetwork = $this->service->create($request->validated());
        return response()->json($socialNetwork, 201);
    }

    public function update(UpdateSocialNetworkRequest $request, $id): JsonResponse
    {
        $socialNetwork = SocialNetwork::findOrFail($id);
        $updated = $this->service->update($socialNetwork, $request->validated());

        return response()->json($updated);
    }

    public function destroy($id): JsonResponse
    {
        $socialNetwork = SocialNetwork::findOrFail($id);
        $this->service->delete($socialNetwork);

        return response()->json(['message' => 'Red social eliminada correctamente']);
    }
}
