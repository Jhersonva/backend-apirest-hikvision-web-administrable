<?php 

namespace App\Http\Controllers\Api\OurTeam;

use App\Http\Controllers\Controller;
use App\Http\Requests\OurTeam\StoreOurTeamRequest;
use App\Http\Requests\OurTeam\UpdateOurTeamRequest;
use App\Models\OurTeam;
use App\Services\OurTeam\OurTeamService;
use Illuminate\Http\JsonResponse;

class OurTeamController extends Controller
{
    protected OurTeamService $service;

    public function __construct(OurTeamService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreOurTeamRequest $request): JsonResponse
    {
        try {
            $ourTeam = $this->service->create($request->validated());
            return response()->json($ourTeam, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(UpdateOurTeamRequest $request, int $id): JsonResponse
    {
        $ourTeam = OurTeam::findOrFail($id);

        try {
            $ourTeam = $this->service->update($ourTeam, $request->validated());
            return response()->json($ourTeam);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        $ourTeam = OurTeam::findOrFail($id);
        $this->service->delete($ourTeam);

        return response()->json(['message' => 'Miembro eliminado correctamente']);
    }
}