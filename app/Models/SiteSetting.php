<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'home_header',
        'about_text',
        'description',
        'home_header_translations',
        'about_text_translations',
        'description_translations',
        'experience',
        'socials',
    ];

    protected $casts = [
        'experience' => 'array',
        'socials' => 'array',
        'home_header_translations' => 'array',
        'about_text_translations' => 'array',
        'description_translations' => 'array',
    ];
}


