<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'excerpt', 'featured_image',
        'is_published', 'user_id', 'meta_title', 'meta_description',
        'meta_keywords', 'enable_schema_markup', 'schema_markup',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'enable_schema_markup' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
}

