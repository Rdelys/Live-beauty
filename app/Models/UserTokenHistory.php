<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTokenHistory extends Model
{
    protected $fillable = [
        'user_id','previous_jetons','new_jetons','delta','source'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
