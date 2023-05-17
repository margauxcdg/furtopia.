<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalShelter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shelter_name', 
        'shelter_address', 
        'shelter_number',
        'shelter_type',
        'shelter_profile',

    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
