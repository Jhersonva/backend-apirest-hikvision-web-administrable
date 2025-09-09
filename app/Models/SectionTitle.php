<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTitle extends Model
{
    use HasFactory;

    protected $fillable = ['section_name'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Forzar orden del JSON e incluir categoría
    public function toArray()
    {
        return [
            'id' => $this->id,
            'section_name' => $this->section_name
        ];
    }
}
