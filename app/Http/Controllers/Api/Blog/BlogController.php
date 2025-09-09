<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\Blog\BlogService;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    protected BlogService $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreBlogRequest $request): JsonResponse
    {
        try {
            $blog = $this->service->create($request->validated());
            return response()->json($blog, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(UpdateBlogRequest $request, int $id): JsonResponse
    {
        $blog = Blog::findOrFail($id);

        try {
            $blog = $this->service->update($blog, $request->validated());
            return response()->json($blog);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        $blog = Blog::findOrFail($id);
        $this->service->delete($blog);

        return response()->json(['message' => 'Blog eliminado correctamente']);
    }
}