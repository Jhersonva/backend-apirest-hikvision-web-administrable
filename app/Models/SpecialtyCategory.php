<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialtyCategory extends Model
{
    use HasFactory;

    protected $table = 'specialty_categories';

    protected $fillable = ['specialty_name'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function ourTeams()
    {
        return $this->hasMany(OurTeam::class, 'id_specialty_category');
    }

    // Forzar orden del JSON e incluir categoría
    public function toArray()
    {
        return [
            'id' => $this->id,
            'specialty_name' => $this->specialty_name
        ];
    }
}