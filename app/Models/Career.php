<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'location',
        'type',
        'application_deadline',
        'attachment',
        'is_active',
        'category',
        'salary'
    ];
     
    protected $dates = ['application_deadline'];

    // Auto-generate slug on create
    public static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            $job->slug = Str::slug($job->title . '-' . uniqid());
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function applications()
{
    return $this->hasMany(JobApplication::class, 'career_id');
}

}
