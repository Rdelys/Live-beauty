<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeleConnexion extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele_id',
        'date_connexion',
        'date_deconnexion',
        'duree_session_secondes'
    ];

    protected $casts = [
        'date_connexion' => 'datetime',
        'date_deconnexion' => 'datetime',
    ];

    /**
     * Relation avec le modèle
     */
    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    /**
     * Calculer la durée de session
     */
    public function calculerDuree()
    {
        if ($this->date_connexion && $this->date_deconnexion) {
            return $this->date_connexion->diffInSeconds($this->date_deconnexion);
        }
        return 0;
    }

    
}