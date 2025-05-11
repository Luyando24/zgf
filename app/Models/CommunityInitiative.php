<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityInitiative extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'summary',
        'description',
        'video_url',
        'cover_image',
        'location',
        'slug',
        'start_date',
        'end_date',
        'status',
        'created_by',
    ];
}

