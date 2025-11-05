<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueJeton extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'modele_id',
        'nombre_jetons',
        'type',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }
}
