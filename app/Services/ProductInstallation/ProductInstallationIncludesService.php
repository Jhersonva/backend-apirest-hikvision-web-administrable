<?php

namespace App\Services\ProductInstallation;

use App\Models\ProductInstallation;
use Illuminate\Support\Facades\DB;
use OutOfBoundsException;

class ProductInstallationIncludesService
{
    /**
     * Listar los items de what_includes
     */
    public function list(ProductInstallation $installation): array
    {
        return $installation->what_includes ?? [];
    }

    /**
     * Agregar un item
     */
    public function add(ProductInstallation $installation, string $item): array
    {
        return DB::transaction(function () use ($installation, $item) {
            $items = $installation->what_includes ?? [];
            $items[] = $item;
            $installation->what_includes = $items;
            $installation->save();

            return $items;
        });
    }

    /**
     * Actualizar un item en una posición específica
     */
    public function updateAt(ProductInstallation $installation, int $index, string $item): array
    {
        return DB::transaction(function () use ($installation, $index, $item) {
            $items = $installation->what_includes ?? [];
            if (!array_key_exists($index, $items)) {
                throw new OutOfBoundsException("Índice fuera de rango");
            }

            $items[$index] = $item;
            $installation->what_includes = $items;
            $installation->save();

            return $items;
        });
    }

    /**
     * Eliminar un item
     */
    public function deleteAt(ProductInstallation $installation, int $index): array
    {
        return DB::transaction(function () use ($installation, $index) {
            $items = $installation->what_includes ?? [];
            if (!array_key_exists($index, $items)) {
                throw new OutOfBoundsException("Índice fuera de rango");
            }

            array_splice($items, $index, 1);
            $installation->what_includes = $items;
            $installation->save();

            return $items;
        });
    }
}