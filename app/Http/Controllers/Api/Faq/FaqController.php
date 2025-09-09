<?php

namespace App\Http\Controllers\Api\Faq;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\StoreFaqRequest;
use App\Http\Requests\Faq\UpdateFaqRequest;
use App\Services\Faq\FaqService;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    protected $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->faqService->getAll(), 200);
    }

    public function show($id): JsonResponse
    {
        $faq = $this->faqService->getById($id);
        return response()->json($faq, 200);
    }

    public function store(StoreFaqRequest $request): JsonResponse
    {
        $faq = $this->faqService->create($request->validated());
        return response()->json($faq, 201);
    }

    public function update(UpdateFaqRequest $request, Faq $id): JsonResponse
    {
        $updated = $this->faqService->update($id, $request->validated());
        return response()->json($updated, 200);
    }

    public function destroy(Faq $id): JsonResponse
    {
        $this->faqService->delete($id);
        return response()->json(['message' => 'Pregunta eliminada correctamente']);
    }
}
