<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformationCompany extends Model
{
    use HasFactory;

    protected $table = 'contact_information_company';

    protected $fillable = [
        'company_logo',
        'description_company',
        'address',
        'cell_phone_number',
        'email',
        'open_time',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
