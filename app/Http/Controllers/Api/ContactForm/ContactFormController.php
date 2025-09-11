<?php


namespace App\Http\Controllers\Api\ContactForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactForm\ContactFormRequest;
use App\Services\ContactForm\ContactFormService;
use Illuminate\Http\JsonResponse;

class ContactFormController extends Controller
{
    protected $contactFormService;

    public function __construct(ContactFormService $contactFormService)
    {
        $this->contactFormService = $contactFormService;
    }

    // Cliente: enviar formulario
    public function store(ContactFormRequest $request): JsonResponse
    {
        $contact = $this->contactFormService->create($request->validated());
        return response()->json([
            'message' => 'Formulario enviado correctamente',
            'data' => $contact,
        ], 201);
    }

    // Admin: listar todos
    public function index(): JsonResponse
    {
        $contacts = $this->contactFormService->getAll();
        return response()->json($contacts);
    }

    // Admin: ver detalle
    public function show(int $id): JsonResponse
    {
        $contact = $this->contactFormService->getById($id);
        if (!$contact) {
            return response()->json(['message' => 'Formulario no encontrado'], 404);
        }
        return response()->json($contact);
    }

    // Admin: eliminar
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->contactFormService->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Formulario no encontrado'], 404);
        }
        return response()->json(['message' => 'Formulario eliminado correctamente']);
    }
}