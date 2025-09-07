<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;

    protected $table = 'payment_plan';

    protected $fillable = [
        'main_title',
        'icon_img_payment_plan',
        'name_plan',
        'price_plan',
        'list_plan',
    ];

    protected $casts = [
        'list_plan' => 'array', 
        'price_plan' => 'decimal:2',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Accessor para devolver URL completa de la imagen
    protected $appends = ['icon_img_payment_plan_url'];

    public function getIconImgPaymentPlanUrlAttribute()
    {
        return $this->icon_img_payment_plan ? asset('storage/' . $this->icon_img_payment_plan) : null;
    }

    // Ordenar el JSON de salida
    public function toArray()
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'name_plan' => $this->name_plan,
            'price_plan' => $this->price_plan,
            'list_plan' => $this->list_plan,
            'icon_img_payment_plan' => $this->icon_img_payment_plan_url,
        ];
    }
}
