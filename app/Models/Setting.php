<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_description',
        'site_logo',
        'site_favicon',
        'contact_email',
        'contact_phone',
        'address',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'google_analytics_id',
        'header_scripts',
        'footer_scripts',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}