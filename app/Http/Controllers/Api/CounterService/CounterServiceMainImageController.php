<?php 

namespace App\Http\Controllers\Api\CounterService;

use App\Http\Controllers\Controller;
use App\Http\Requests\CounterService\CounterServiceMainImageRequest;
use App\Models\CounterServiceMainImage;
use App\Services\CounterServiceMainImageService;
use Illuminate\Support\Facades\Storage;

class CounterServiceMainImageController extends Controller
{
    protected $service;

    public function __construct(CounterServiceMainImageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->get());
    }

    public function update(CounterServiceMainImageRequest $request)
    {
        $mainImage = $this->service->update($request);
        return response()->json($mainImage);
    }
}