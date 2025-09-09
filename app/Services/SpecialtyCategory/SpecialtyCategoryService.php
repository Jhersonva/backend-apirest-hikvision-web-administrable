<?php 

namespace App\Services\SpecialtyCategory;

use App\Models\SpecialtyCategory;

class SpecialtyCategoryService
{
    public function getAll()
    {
        return SpecialtyCategory::all();
    }

    public function create(array $data): SpecialtyCategory
    {
        return SpecialtyCategory::create($data);
    }

    public function update(int $id, array $data): ?SpecialtyCategory
    {
        $specialty = SpecialtyCategory::find($id);
        if ($specialty) {
            $specialty->update($data);
        }
        return $specialty;
    }

    public function delete(int $id): bool
    {
        $specialty = SpecialtyCategory::find($id);
        return $specialty ? $specialty->delete() : false;
    }
}