<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetCare extends Model
{
    use HasFactory;
    protected $fillable = 
        ['title', 
        'author',
        'category', 
        'content', 
        'image'
        ];

}
