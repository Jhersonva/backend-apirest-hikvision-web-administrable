<?php


namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreRequest;
use App\Services\Store\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * Mostrar la configuración de la tienda
     */
    public function show()
    {
        $store = $this->storeService->getStore();

        if (!$store) {
            return response()->json(['message' => 'No existe configuración de tienda'], 404);
        }

        return response()->json($store, 200);
    }

    /**
     * Actualizar la configuración de la tienda
     */
    public function update(StoreRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('img_store_discount');

        $store = $this->storeService->updateStore($data, $file);

        return response()->json([
            'message' => 'Configuración de la tienda actualizada correctamente',
            'store' => $store
        ], 200);
    }
}