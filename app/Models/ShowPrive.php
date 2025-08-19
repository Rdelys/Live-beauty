<?php
// app/Models/ShowPrive.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowPrive extends Model
{
    protected $fillable = [
        'user_id', 'modele_id', 'date', 'debut', 'fin',
        'duree', 'jetons_total', 'etat'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function modele() {
        return $this->belongsTo(Modele::class);
    }
}
