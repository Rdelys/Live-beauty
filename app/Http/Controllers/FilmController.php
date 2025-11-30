<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Modele;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'modele_id' => 'required|exists:modeles,id',
            'detail'    => 'required|string',
            'minutes'   => 'required|integer|min:5',
            'type_envoi'=> 'required|in:email,whatsapp',
        ]);

        $user = auth()->user(); // 🔥 l'utilisateur connecté

        // Tarif : 5 min = 250 jetons + 20 / minute supplémentaire
        $extra = $request->minutes - 5;
        $jetons = 250 + ($extra * 20);

        // Vérification jetons
        if ($user->jetons < $jetons) {
            return back()->with('error', "Vous n’avez pas assez de jetons !");
        }

        // Déduction
        $user->jetons -= $jetons;
        $user->save();

        // Enregistrement film
        Film::create([
            'user_id'   => $user->id,
            'modele_id' => $request->modele_id,
            'detail'    => $request->detail,
            'minutes'   => $request->minutes,
            'jetons'    => $jetons,
            'type_envoi'=> $request->type_envoi,
        ]);

        return back()->with('success', 'Votre demande de film a été envoyée !');
    }
}
