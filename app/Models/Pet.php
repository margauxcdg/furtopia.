<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model{

    use HasFactory;

    protected $fillable = [
        'name', 
        'animal_type', 
        'age', 
        'description',
        'gender',
        'color', 
        'image',
        'user_id',
        'like',
        
    ];

    public function shelter()
    {
        return $this->belongsTo(AnimalShelter::class, 'user_id');
    }

    public function shelters()
    {
        return $this->belongsToMany(AnimalShelter::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adoptionform()
    {
        return $this->hasMany(AdoptionForm::class);
    }
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }


}

