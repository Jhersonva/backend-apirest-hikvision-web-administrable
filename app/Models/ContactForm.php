<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $table = 'contact_forms';

    protected $fillable = [
        'customer_name',
        'email',
        'affair',
        'message',
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
            'customer_name' => $this->customer_name,
            'email' => $this->email,
            'affair' => $this->affair,
            'message' => $this->message,
        ];
    }
}
