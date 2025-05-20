<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    
    // Specify the correct table name
    protected $table = 'team_members';
    
    protected $fillable = [
        'name',
        'position',
        'description',
        'bio',
        'image',
        'email',
        'linkedin',
        'twitter'
        // Add any other fields your table has
    ];
}

