<?php

namespace App\Services\ProductDetail;

use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use OutOfBoundsException;

class ProductDetailIncludesService
{
    /**
     * Retorna el array de what_includes (si no existe devuelve []).
     */
    public function list(ProductDetail $detail): array
    {
        $items = $detail->what_includes;

        if (is_string($items)) {
            $decoded = json_decode($items, true);
            return is_array($decoded) ? $decoded : [];
        }

        return $items ?? [];
    }

    /**
     * Agrega un item al final del array.
     */
    public function add(ProductDetail $detail, string $item): array
    {
        return DB::transaction(function () use ($detail, $item) {
            $items = $detail->what_includes ?? [];
            $items[] = $item;
            $detail->what_includes = $items;
            $detail->save();
            return $items;
        });
    }

    /**
     * Actualiza el item en la posición $index (0-based).
     * Lanza OutOfBoundsException si el índice no existe.
     */
    public function updateAt(ProductDetail $detail, int $index, string $item): array
    {
        return DB::transaction(function () use ($detail, $index, $item) {
            $items = $detail->what_includes ?? [];
            if (!array_key_exists($index, $items)) {
                throw new OutOfBoundsException("Índice fuera de rango");
            }
            $items[$index] = $item;
            $detail->what_includes = $items;
            $detail->save();
            return $items;
        });
    }

    /**
     * Elimina el item en la posición $index (0-based).
     * Lanza OutOfBoundsException si el índice no existe.
     */
    public function deleteAt(ProductDetail $detail, int $index): array
    {
        return DB::transaction(function () use ($detail, $index) {
            $items = $detail->what_includes ?? [];
            if (!array_key_exists($index, $items)) {
                throw new OutOfBoundsException("Índice fuera de rango");
            }
            array_splice($items, $index, 1);
            $detail->what_includes = $items;
            $detail->save();
            return $items;
        });
    }
}