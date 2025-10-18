<?php

namespace App\Http\Controllers;

use App\Models\Jeton;
use App\Models\JetonPropose;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JetonController extends Controller
{
    /**
     * Création d’un jeton (modèle ou admin)
     */
    public function store(Request $request)
    {
        // === CAS 1 : Modèle connecté ===
        if (session()->has('modele_logged_in')) {

            $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'nombre_de_jetons' => 'required|numeric|min:0',
                'jeton_propose_id' => 'nullable|integer|exists:jetons_proposes,id',
            ]);

            // Vérifie doublon
            $exists = Jeton::where('modele_id', session('modele_id'))
                ->whereRaw('LOWER(nom) = ?', [strtolower($request->nom)])
                ->exists();

            if ($exists) {
                return redirect()->route('modele.profil')
                    ->withErrors(['nom' => '❌ Un jeton avec ce nom existe déjà.']);
            }

            // Création jeton
            $jeton = new Jeton();
            $jeton->nom = $request->nom;
            $jeton->description = $request->description;
            $jeton->nombre_de_jetons = $request->nombre_de_jetons;
            $jeton->modele_id = session('modele_id');

            // Si vient d’un jeton proposé
            if ($request->filled('jeton_propose_id')) {
                $jeton->jeton_propose_id = $request->jeton_propose_id;
                $jeton->jeton_propose_prise = 1;

                // Marque le jeton proposé comme pris
                JetonPropose::where('id', $request->jeton_propose_id)
                    ->update(['prise' => 1]);
            }

            $jeton->save();

            return redirect()->route('modele.profil')->with('success', 'Jeton créé avec succès.');
        }

        // === CAS 2 : ADMIN (multi création) ===
        $request->validate([
            'nom.*' => 'required|string|max:255',
            'description.*' => 'nullable|string|max:1000',
            'nombre_de_jetons.*' => 'required|numeric|min:0',
        ]);

        foreach ($request->nom as $index => $nom) {
            Jeton::create([
                'nom' => $nom,
                'description' => $request->description[$index],
                'nombre_de_jetons' => $request->nombre_de_jetons[$index],
                'modele_id' => null,
            ]);
        }

        return redirect()->route('admin')->with('success', 'Jetons ajoutés avec succès.');
    }

    /**
     * Utilisation d’un jeton par un utilisateur
     */
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

    /**
     * Utilisation d’une surprise
     */
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

        $user->jetons -= $request->cost;
        $user->save();

        $modele = Modele::find($request->modele_id);
        $modele->jetons_surprise += $request->cost;
        $modele->save();

        return response()->json(['new_balance' => $user->jetons]);
    }

    /**
     * Suppression d’un jeton
     */
    public function destroy($id)
    {
        $jeton = Jeton::findOrFail($id);

        // Vérifie que c’est bien le modèle connecté
        if (session()->has('modele_id') && $jeton->modele_id == session('modele_id')) {

            // Si jeton lié à un jeton proposé → libère-le
            if ($jeton->jeton_propose_id) {
                JetonPropose::where('id', $jeton->jeton_propose_id)
                    ->update(['prise' => 0]);
            }

            $jeton->delete();

            return redirect()->route('modele.profil')->with('success', 'Jeton supprimé avec succès.');
        }

        return redirect()->route('forbidden');
    }
}
