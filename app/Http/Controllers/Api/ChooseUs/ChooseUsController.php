<?php

namespace App\Http\Controllers\Api\ChooseUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChooseUs\UpdateChooseUsRequest;
use App\Services\ChooseUsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChooseUsController extends Controller
{
    protected ChooseUsService $service;

    public function __construct(ChooseUsService $service)
    {
        $this->service = $service;
    }

    // GET → obtener información general
    public function getInfo(): JsonResponse
    {
        $data = $this->service->getInfo();
        return response()->json($data);
    }

    // PUT → actualizar información general
    public function update(UpdateChooseUsRequest $request): JsonResponse
    {
        $data = $this->service->updateInfo($request->validated());
        return response()->json([
            'message' => 'Información actualizada correctamente',
            'data' => $data,
        ]);
    }

    // ---------- CRUD de list_choose_us ----------
    public function listAll(): JsonResponse
    {
        return response()->json($this->service->getList());
    }

    public function addList(Request $request): JsonResponse
    {
        $request->validate(['item' => 'required|string']);
        return response()->json($this->service->addListItem($request->item));
    }

    public function updateList(Request $request, int $id): JsonResponse
    {
        $request->validate(['item' => 'required|string']);
        return response()->json($this->service->updateListItem($id, $request->item));
    }

    public function deleteList(int $id): JsonResponse
    {
        return response()->json($this->service->deleteListItem($id));
    }

    // ---------- CRUD de note_list ----------
    public function noteListAll(): JsonResponse
    {
        return response()->json($this->service->getNoteList());
    }

    public function addNote(Request $request): JsonResponse
    {
        $request->validate(['item' => 'required|string']);
        return response()->json($this->service->addNoteItem($request->item));
    }

    public function updateNote(Request $request, int $id): JsonResponse
    {
        $request->validate(['item' => 'required|string']);
        return response()->json($this->service->updateNoteItem($id, $request->item));
    }

    public function deleteNote(int $id): JsonResponse
    {
        return response()->json($this->service->deleteNoteItem($id));
    }
}
