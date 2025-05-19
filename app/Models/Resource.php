<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Resource extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'file_path',
        'type',
        'icon',
        'download_count',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($resource) {
            $resource->slug = Str::slug($resource->title);
        });

        static::updating(function ($resource) {
            if ($resource->isDirty('title')) {
                $resource->slug = Str::slug($resource->title);
            }
        });
    }
}
