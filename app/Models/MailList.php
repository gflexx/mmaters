<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function recipient(){
        return $this->hasMany(User::class);
    }


}
