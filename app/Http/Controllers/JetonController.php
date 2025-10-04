<?php

namespace App\Http\Controllers;

use App\Models\Jeton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JetonController extends Controller
{
    public function store(Request $request)
{
    // Cas 1 : modèle connecté (via session)
    if (session()->has('modele_logged_in')) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'nombre_de_jetons' => 'required|numeric|min:0',
        ]);

        \App\Models\Jeton::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'nombre_de_jetons' => $request->nombre_de_jetons,
            'modele_id' => session('modele_id'),
        ]);

        return redirect()->route('modele.profil')->with('success', 'Jeton créé avec succès.');
    }

    // Cas 2 : admin (multi-création via tableau)
    $request->validate([
        'nom.*' => 'required|string|max:255',
        'description.*' => 'nullable|string|max:1000',
        'nombre_de_jetons.*' => 'required|numeric|min:0',
    ]);

    foreach ($request->nom as $index => $nom) {
        \App\Models\Jeton::create([
            'nom' => $nom,
            'description' => $request->description[$index],
            'nombre_de_jetons' => $request->nombre_de_jetons[$index],
            'modele_id' => null, // Ou un ID admin
        ]);
    }

    return redirect()->route('admin')->with('success', 'Jetons ajoutés avec succès.');
}
public function useJeton(Request $request)
    {
        $request->validate([
            'cost' => 'required|integer|min:1',
            'name' => 'required|string',
            'modele_id' => 'required|integer',
        ]);

        $user = Auth::user();

        if ($user->jetons < $request->cost) {
            return response()->json(['error' => 'Nombre de jetons insuffisant'], 403);
        }

        // Déduire
        $user->jetons -= $request->cost;
        $user->save();

        return response()->json([
            'success' => true,
            'new_balance' => $user->jetons,
            'name' => $request->name,
            'cost' => $request->cost,
            'modele_id' => $request->modele_id
        ]);
    }

    public function useSurprise(Request $request)
{
    $request->validate([
        'cost' => 'required|integer|min:1',
        'modele_id' => 'required|exists:modeles,id'
    ]);

    $user = auth()->user();
    if ($user->jetons < $request->cost) {
        return response()->json(['error' => 'Pas assez de jetons'], 400);
    }

    // Retirer jetons à l'user
    $user->jetons -= $request->cost;
    $user->save();

    // Ajouter au modèle
    $modele = \App\Models\Modele::find($request->modele_id);
    $modele->jetons_surprise += $request->cost;
    $modele->save();

    return response()->json([
        'new_balance' => $user->jetons
    ]);
}


public function destroy($id)
{
    $jeton = \App\Models\Jeton::findOrFail($id);

    // Vérifie que c’est bien le modèle connecté qui possède le jeton
    if (session()->has('modele_id') && $jeton->modele_id == session('modele_id')) {
        $jeton->delete();
        return redirect()->route('modele.profil')->with('success', 'Jeton supprimé avec succès.');
    }

    return redirect()->route('forbidden');
}
}
