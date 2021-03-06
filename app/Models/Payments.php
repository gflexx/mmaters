<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'phonenumber'
    ];

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
