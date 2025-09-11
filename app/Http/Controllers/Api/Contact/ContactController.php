<?php

namespace App\Http\Controllers\Api\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Services\Contact\ContactService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Obtener el registro de contacto
     */
    public function show(): JsonResponse
    {
        $contact = $this->contactService->getContact();
        return response()->json($contact);
    }

    /**
     * Actualizar o crear el registro de contacto
     */
    public function update(UpdateContactRequest $request): JsonResponse
    {
        $contact = $this->contactService->updateContact($request->validated());
        return response()->json([
            'message' => 'Contacto actualizado correctamente',
            'data' => $contact,
        ]);
    }
}