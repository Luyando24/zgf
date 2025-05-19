<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'content',
        'status',
        'created_by',
        'approved_by',
        'approved_at',
        'sent_at',
        'sent_count',
        'failed_count'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'approved_at' => 'datetime',
        'sent_count' => 'integer',
        'failed_count' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($newsletter) {
            if (!$newsletter->created_by) {
                $newsletter->created_by = auth()->id();
            }
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}