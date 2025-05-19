<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'status', // active, unsubscribed
        'unsubscribed_at',
        'last_sent_at'
    ];

    protected $casts = [
        'unsubscribed_at' => 'datetime',
        'last_sent_at' => 'datetime'
    ];

    /**
     * Get the encrypted unsubscribe token for this subscriber
     *
     * @return string
     */
    public function getUnsubscribeToken()
    {
        return Crypt::encryptString($this->email);
    }
}