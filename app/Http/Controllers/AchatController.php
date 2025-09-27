<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchatController extends Controller
{
    public function acheter(Request $request, $modeleId)
    {
        try {
            $modele = Modele::findOrFail($modeleId);
            $user   = Auth::user();

            $prix = $modele->prix_flou ?? $request->input('prix', 0);

            // Vérif jetons suffisants
            if ($user->jetons < $prix) {
                return response()->json(['error' => 'Pas assez de jetons'], 403);
            }

            // Vérif si déjà acheté
            if (Achat::where('user_id', $user->id)->where('modele_id', $modele->id)->exists()) {
                return response()->json(['success' => true, 'message' => 'Déjà acheté']);
            }

            // Débiter jetons
            $user->jetons -= $prix;
            $user->save();

            // Enregistrer l’achat
            Achat::create([
                'user_id'   => $user->id,
                'modele_id' => $modele->id,
                'jetons'    => $prix,
                'created_at'=> now(),
            ]);

            return response()->json([
                'success'     => true,
                'new_balance' => $user->jetons,
                'message'     => 'Achat réussi'
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function dashboard()
    {
        $modeles = Modele::all();
        $achats  = [];

        if (Auth::check()) {
            $achats = Achat::where('user_id', Auth::id())->pluck('modele_id')->toArray();
        }

        return view('dashboard', compact('modeles', 'achats'));
    }
}
