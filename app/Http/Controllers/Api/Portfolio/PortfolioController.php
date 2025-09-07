<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\StorePortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Services\PortfolioService;
use Illuminate\Http\JsonResponse;

class PortfolioController extends Controller
{
    protected PortfolioService $service;

    public function __construct(PortfolioService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return response()->json($data);
    }

    public function store(StorePortfolioRequest $request): JsonResponse
    {
        $data = $request->validated();
        $portfolio = $this->service->create($data);

        return response()->json($portfolio, 201);
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $id): JsonResponse
    {
        $data = $request->validated();
        $id = $this->service->update($id, $data);

        return response()->json($id);
    }

    public function destroy(Portfolio $id): JsonResponse
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Portfolio eliminada con éxito']);
    }
}
