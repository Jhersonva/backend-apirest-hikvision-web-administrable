<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PortfolioService
{
    public function getAll()
    {
        return Portfolio::with('category')->get();
    }

    public function create(array $data): Portfolio
    {
        if (isset($data['img_portfolio']) && $data['img_portfolio'] instanceof UploadedFile) {
            $path = $data['img_portfolio']->store('portfolios', 'public');
            $data['img_portfolio'] = $path;
        }

        return Portfolio::create($data);
    }

    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        if (isset($data['img_portfolio']) && $data['img_portfolio'] instanceof UploadedFile) {
            if ($portfolio->img_portfolio && Storage::disk('public')->exists($portfolio->img_portfolio)) {
                Storage::disk('public')->delete($portfolio->img_portfolio);
            }

            $path = $data['img_portfolio']->store('portfolios', 'public');
            $data['img_portfolio'] = $path;
        } else {
            unset($data['img_portfolio']);
        }

        $portfolio->update($data);

        return $portfolio->refresh();
    }

    public function delete(Portfolio $portfolio): bool
    {
        if ($portfolio->img_portfolio && Storage::disk('public')->exists($portfolio->img_portfolio)) {
            Storage::disk('public')->delete($portfolio->img_portfolio);
        }

        return $portfolio->delete();
    }
}
