<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_category_id',
        'main_title',
        'img_portfolio',
        'name_portfolio',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Accessor para devolver la URL completa de la imagen
    protected $appends = ['img_portfolio_url'];

    public function getImgPortfolioUrlAttribute()
    {
        return $this->img_portfolio ? asset('storage/' . $this->img_portfolio) : null;
    }

    /**
     * Relación: un Portfolio pertenece a una categoría
     */
    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'portfolio_category_id' => $this->portfolio_category_id,
            'category' => $this->category ? [
                'id' => $this->category->id,
                'title_portfolio_category' => $this->category->title_portfolio_category,
            ] : null,
            'main_title' => $this->main_title,
            'img_portfolio' => $this->img_portfolio_url,
            'name_portfolio' => $this->name_portfolio,
        ];
    }
}
