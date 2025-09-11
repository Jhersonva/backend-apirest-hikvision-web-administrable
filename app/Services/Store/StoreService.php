<?php


namespace App\Services\Store;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;

class StoreService
{
    /**
     * Obtener la configuración actual de la tienda
     */
    public function getStore()
    {
        return Store::with(['categoryProduct', 'product'])->first();
    }

    /**
     * Actualizar la configuración de la tienda
     */
    public function updateStore(array $data, $file = null)
    {
        $store = Store::first();

        if (!$store) {
            $store = new Store();
        }

        if ($file) {
            if ($store->img_store_discount) {
                Storage::disk('public')->delete($store->img_store_discount);
            }
            $path = $file->store('stores', 'public');
            $data['img_store_discount'] = $path;
        }

        $store->fill($data);
        $store->save();

        return $store->fresh(['categoryProduct', 'product']);
    }
}