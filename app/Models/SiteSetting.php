<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'header_tagline',
        'home_header',
        'about_text',
        'header_tagline_translations',
        'home_header_translations',
        'about_text_translations',
        'description',
        'description_translations',
        'experience',
        'socials',
    ];

    protected $casts = [
        'experience' => 'array',
        'socials' => 'array',
        'header_tagline_translations' => 'array',
        'home_header_translations' => 'array',
        'about_text_translations' => 'array',
        'description_translations' => 'array',
    ];
}


