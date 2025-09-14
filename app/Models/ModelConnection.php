<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelConnection extends Model
{
    protected $fillable = [
        'modele_id', 'ip', 'user_agent',
    ];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }
}
