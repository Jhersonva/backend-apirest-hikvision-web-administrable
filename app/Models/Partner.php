<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'name_partner',
        'img_partner',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'img_partner'
    ];

    // Accessor para devolver la URL completa de la imagen
    protected $appends = ['img_partner_url'];

    public function getImgPartnerUrlAttribute()
    {
        return $this->img_partner ? asset('storage/' . $this->img_partner) : null;
    }

    // Ordenar salida del JSON
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name_partner' => $this->name_partner,
            'img_partner_url' => $this->img_partner_url,
        ];
    }
}
