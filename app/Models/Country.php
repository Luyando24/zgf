<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
