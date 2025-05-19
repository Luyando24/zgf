<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'transaction_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'donor_email',
        'donor_name',
        'metadata',
    ];
}
