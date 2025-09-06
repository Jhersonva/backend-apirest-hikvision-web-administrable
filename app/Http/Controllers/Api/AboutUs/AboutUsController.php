<?php

namespace App\Http\Controllers\Api\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\UpdateAboutUsRequest;
use App\Http\Requests\AboutUs\ListAboutUsRequest;
use App\Services\AboutUsService;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    protected $service;

    public function __construct(AboutUsService $service)
    {
        $this->service = $service;
    }

    /* ====== ABOUT US ====== */
    public function getInfo()
    {
        return response()->json($this->service->getInfo());
    }

    public function update(UpdateAboutUsRequest $request)
    {
        $about = $this->service->updateInfo($request->all());
        return response()->json($about);
    }

    /*
    public function updateImage(Request $request)
    {
        $request->validate([
            'img_about' => 'required|image|max:2048',
        ]);

        $url = $this->service->updateImage($request->file('img_about'));

        return response()->json(['img_about_url' => $url]);
    }*/

    /* ====== LIST_ABOUT_US CRUD ====== */
    public function listAll()
    {
        return response()->json($this->service->getListItems());
    }

    public function add(ListAboutUsRequest $request)
    {
        $list = $this->service->addListItem($request->item);
        return response()->json($list);
    }

    public function updateList(Request $request, int $index)
    {
        $request->validate(['item' => 'required|string|max:255']);
        $list = $this->service->updateListItem($index, $request->item);

        if (!$list) {
            return response()->json(['error' => 'Índice no encontrado'], 404);
        }

        return response()->json($list);
    }

    public function deleteList(int $index)
    {
        $list = $this->service->deleteListItem($index);

        if (!$list) {
            return response()->json(['error' => 'Índice no encontrado'], 404);
        }

        return response()->json($list);
    }
}
