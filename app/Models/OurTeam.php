<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;

    protected $table = 'our_teams';

    protected $fillable = [
        'id_specialty_category',
        'img_our_team',
        'name_employee',
        'contact_value_whatsapp',
        'contact_url_whatsapp',
        'contact_value_celular',
        'contact_url_celular',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_our_team',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['img_our_team_url'];

    public function getImgOurTeamUrlAttribute()
    {
        return $this->img_our_team ? asset('storage/' . $this->img_our_team) : null;
    }

    // Relación con SpecialtyCategory
    public function specialtyCategory()
    {
        return $this->belongsTo(SpecialtyCategory::class, 'id_specialty_category');
    }

    // Forzar el orden del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_employee' => $this->name_employee,
            'img_our_team_url' => $this->img_our_team_url,
            'specialty_category' => $this->specialtyCategory 
                ? $this->specialtyCategory->specialty_name 
                : null,
            'contacts' => [
                'whatsapp' => [
                    'value' => $this->contact_value_whatsapp,
                    'url'   => $this->contact_url_whatsapp,
                ],
                'celular' => [
                    'value' => $this->contact_value_celular,
                    'url'   => $this->contact_url_celular,
                ],
            ]
        ];
    }
}
