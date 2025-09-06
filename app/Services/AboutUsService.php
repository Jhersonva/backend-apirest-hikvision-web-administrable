<?php

namespace App\Services;

use App\Models\AboutUs;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AboutUsService
{
    public function getInfo()
    {
        return AboutUs::first();
    }

    public function updateInfo(array $data)
    {
        $about = AboutUs::first();

        if (!$about) {
            $about = new AboutUs();
        }

        if (isset($data['img_about']) && $data['img_about'] instanceof \Illuminate\Http\UploadedFile) {
            if ($about->img_about && Storage::disk('public')->exists($about->img_about)) {
                Storage::disk('public')->delete($about->img_about);
            }
            $path = $data['img_about']->store('about_us', 'public');
            $data['img_about'] = $path;
        }

        $about->fill($data)->save();

        return $about;
    }

    /* ========== LIST_ABOUT_US CRUD (dentro de JSON) ========== */

    public function getListItems()
    {
        $about = AboutUs::first();
        return $about ? $about->list_about_us : [];
    }

    public function addListItem(string $item)
    {
        $about = AboutUs::first();
        if (!$about) {
            $about = AboutUs::create([
                'main_title' => '',
                'description' => '',
                'list_about_us' => [],
                'experience' => '',
                'number_about_us' => '',
            ]);
        }

        $list = $about->list_about_us ?? [];
        $list[] = $item;

        $about->list_about_us = $list;
        $about->save();

        return $about->list_about_us;
    }

    public function updateListItem(int $index, string $newItem)
    {
        $about = AboutUs::first();
        if (!$about || !$about->list_about_us) {
            return null;
        }

        $list = $about->list_about_us;
        if (!isset($list[$index])) {
            return null; 
        }

        $list[$index] = $newItem;
        $about->list_about_us = $list;
        $about->save();

        return $about->list_about_us;
    }

    public function deleteListItem(int $index)
    {
        $about = AboutUs::first();
        if (!$about || !$about->list_about_us) {
            return null;
        }

        $list = $about->list_about_us;
        if (!isset($list[$index])) {
            return null;
        }

        unset($list[$index]);
        $about->list_about_us = array_values($list); // reindexar
        $about->save();

        return $about->list_about_us;
    }
}
