<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'phone_number',
        'whatsapp_number',
        'governorate',
        'city',
        'region',
        'blood_group',
        'chronic_disease',
        'additional_notes',
    ];

    // تحويل تاريخ الميلاد تلقائيًا إلى كائن Carbon
    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
