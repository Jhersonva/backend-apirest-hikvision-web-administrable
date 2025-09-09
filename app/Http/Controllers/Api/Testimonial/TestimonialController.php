<?php

namespace App\Http\Controllers\Api\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\Testimonial\TestimonialService;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    protected TestimonialService $service;

    public function __construct(TestimonialService $service)
    {
        $this->service = $service;
    }

    // GET → listar todos
    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return response()->json($data);
    }

    // POST → crear
    public function store(StoreTestimonialRequest $request): JsonResponse
    {
        $data = $request->validated();
        $testimonial = $this->service->create($data);

        return response()->json($testimonial, 201);
    }

    // PUT → actualizar
    public function update(UpdateTestimonialRequest $request, int $id): JsonResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->validated();
        $testimonial = $this->service->update($testimonial, $data);

        return response()->json($testimonial);
    }

    // DELETE → eliminar
    public function destroy(int $id): JsonResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->service->delete($testimonial);

        return response()->json(['message' => 'Testimonio eliminado correctamente']);
    }
}
