<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
{
    public function toggle($modele_id)
    {
        $user = Auth::user();

        if ($user->favoris()->where('modele_id', $modele_id)->exists()) {
            $user->favoris()->detach($modele_id);
            return back()->with('success', '❌ Modèle retiré des favoris.');
        } else {
            $user->favoris()->attach($modele_id);
            return back()->with('success', '✅ Modèle ajouté aux favoris.');
        }
    }
}

