<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['message', 'recipient_id'];

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
