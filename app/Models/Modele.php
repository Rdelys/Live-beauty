<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

   protected $fillable = [
    'nom', 'prenom', 'description', 'video_link', 'video_file', 'photos','email', 'password', 'en_ligne'
];

protected $casts = [
    'photos' => 'array',
    'video_link' => 'array',
    'video_file' => 'array',
];


    protected $table = 'modeles'; // Assurez-vous que le nom de la table

    // app/Models/Modele.php
public function jetons()
{
    return $this->hasMany(Jeton::class);
}
public function favoris()
{
    return $this->belongsToMany(User::class, 'favoris');
}


}
