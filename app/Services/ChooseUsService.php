<?php

namespace App\Services;

use App\Models\ChooseUs;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ChooseUsService
{
    public function getInfo()
    {
        return ChooseUs::first();
    }

    public function updateInfo(array $data)
    {
        $info = ChooseUs::first();

        if (!$info) {
            $info = new ChooseUs();
        }

        // Guardar icon_img_choose_us
        if (isset($data['icon_img_choose_us']) && $data['icon_img_choose_us'] instanceof UploadedFile) {
            if ($info->icon_img_choose_us && Storage::disk('public')->exists($info->icon_img_choose_us)) {
                Storage::disk('public')->delete($info->icon_img_choose_us);
            }
            $path = $data['icon_img_choose_us']->store('choose_us', 'public');
            $data['icon_img_choose_us'] = $path;
        }

        // Guardar img_choose_us
        if (isset($data['img_choose_us']) && $data['img_choose_us'] instanceof UploadedFile) {
            if ($info->img_choose_us && Storage::disk('public')->exists($info->img_choose_us)) {
                Storage::disk('public')->delete($info->img_choose_us);
            }
            $path = $data['img_choose_us']->store('choose_us', 'public');
            $data['img_choose_us'] = $path;
        }

        $info->fill($data)->save();

        return $info;
    }

    // ---------- CRUD para list_choose_us ----------
    public function getList(): array
    {
        $info = ChooseUs::first();
        return $info ? $info->list_choose_us ?? [] : [];
    }

    public function addListItem(string $item): array
    {
        $info = ChooseUs::first();
        $list = $info->list_choose_us ?? [];
        $list[] = $item;
        $info->list_choose_us = $list;
        $info->save();
        return $list;
    }

    public function updateListItem(int $index, string $item): array
    {
        $info = ChooseUs::first();
        $list = $info->list_choose_us ?? [];
        if (!isset($list[$index])) {
            throw new \Exception("Ítem no encontrado en list_choose_us");
        }
        $list[$index] = $item;
        $info->list_choose_us = $list;
        $info->save();
        return $list;
    }

    public function deleteListItem(int $index): array
    {
        $info = ChooseUs::first();
        $list = $info->list_choose_us ?? [];
        if (!isset($list[$index])) {
            throw new \Exception("Ítem no encontrado en list_choose_us");
        }
        unset($list[$index]);
        $info->list_choose_us = array_values($list);
        $info->save();
        return $list;
    }

    // ---------- CRUD para note_list ----------
    public function getNoteList(): array
    {
        $info = ChooseUs::first();
        return $info ? $info->note_list ?? [] : [];
    }

    public function addNoteItem(string $item): array
    {
        $info = ChooseUs::first();
        $list = $info->note_list ?? [];
        $list[] = $item;
        $info->note_list = $list;
        $info->save();
        return $list;
    }

    public function updateNoteItem(int $index, string $item): array
    {
        $info = ChooseUs::first();
        $list = $info->note_list ?? [];
        if (!isset($list[$index])) {
            throw new \Exception("Ítem no encontrado en note_list");
        }
        $list[$index] = $item;
        $info->note_list = $list;
        $info->save();
        return $list;
    }

    public function deleteNoteItem(int $index): array
    {
        $info = ChooseUs::first();
        $list = $info->note_list ?? [];
        if (!isset($list[$index])) {
            throw new \Exception("Ítem no encontrado en note_list");
        }
        unset($list[$index]);
        $info->note_list = array_values($list);
        $info->save();
        return $list;
    }
}
