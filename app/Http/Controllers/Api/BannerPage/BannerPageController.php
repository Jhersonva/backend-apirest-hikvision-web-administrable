<?php

namespace App\Http\Controllers\Api\BannerPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerPage\UpdateBannerPageRequest;
use App\Models\BannerPage;
use App\Services\BannerPage\BannerPageService;
use Illuminate\Http\JsonResponse;

class BannerPageController extends Controller
{
    protected BannerPageService $service;

    public function __construct(BannerPageService $service)
    {
        $this->service = $service;
    }

    /**
     * GET → Traer los 3 banners.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    /**
     * PUT/PATCH → Actualizar un banner.
     */
    public function update(UpdateBannerPageRequest $request, int $id): JsonResponse
    {
        $banner = BannerPage::findOrFail($id);

        try {
            $updated = $this->service->update($banner, $request->validated());
            return response()->json($updated);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}