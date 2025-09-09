<?php
namespace App\Services\SectionTitle;

use App\Models\SectionTitle;

class SectionTitleService
{
    public function getAll()
    {
        return SectionTitle::all();
    }

    public function getById(int $id): ?SectionTitle
    {
        return SectionTitle::find($id);
    }

    public function create(array $data): SectionTitle
    {
        return SectionTitle::create($data);
    }

    public function update(int $id, array $data): ?SectionTitle
    {
        $section = SectionTitle::find($id);
        if ($section) {
            $section->update($data);
        }
        return $section;
    }

    public function delete(int $id): bool
    {
        $section = SectionTitle::find($id);
        return $section ? $section->delete() : false;
    }
}
