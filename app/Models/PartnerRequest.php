<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PartnerRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'organization',
        'email',
        'phone',
        'partnership_type',
        'message',
        'document',
        'status',
    ];

    /**
     * Get the URL for the document.
     *
     * @return string|null
     */
    public function getDocumentUrlAttribute()
    {
        if (!$this->document) {
            return null;
        }

        return Storage::disk('public')->url($this->document);
    }
}

