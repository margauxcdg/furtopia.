<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetManagement extends Model
{
    protected $fillable = [
        'pet_id',
        'adopter_name',
        'adopter_address',
        'adopter_phone',
        'adopter_age',
        'adopter_occupation',
        'status'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
