<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address',
        'phone_number',  
        'profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
