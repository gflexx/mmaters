<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message'
    ];

    public function sender()
    {
        return $this->belongsToMany(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsToMany(User::class, 'receiver_id');
    }
}
