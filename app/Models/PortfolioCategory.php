<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_portfolio_category',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Forzar orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'title_portfolio_category' => $this->title_portfolio_category,
        ];
    }
}
