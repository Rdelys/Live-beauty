<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    protected $fillable = ['user_id', 'modele_id', 'jetons'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function modele() {
        return $this->belongsTo(Modele::class);
    }
}
