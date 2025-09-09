<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'response',
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
            'question' => $this->question,
            'response' => $this->response,
        ];
    }
}
