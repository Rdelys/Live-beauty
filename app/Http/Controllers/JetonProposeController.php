<?php

namespace App\Http\Controllers;

use App\Models\JetonPropose;
use Illuminate\Http\Request;

class JetonProposeController extends Controller
{
    // Affiche la liste (pour admin)
    public function index()
    {
        $jetonsProposes = JetonPropose::orderBy('nom')->get();
        return view('admin.jetons_proposes.index', compact('jetonsProposes'));
    }

    // Stocke un jeton proposé (form admin)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'nombre_de_jetons' => 'required|integer|min:0',
            'inputs' => 'nullable|array',
        ]);

        JetonPropose::create([
            'nom' => $validated['nom'],
            'description' => $validated['description'] ?? null,
            'nombre_de_jetons' => $validated['nombre_de_jetons'],
            'inputs' => $validated['inputs'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Jeton proposé créé.');
    }

    // Retourne JSON (API pour pré-remplir côté modèle)
    public function show($id)
    {
        return response()->json(JetonPropose::findOrFail($id));
    }

    // Suppression (admin)
    public function destroy($id)
    {
        $jp = JetonPropose::findOrFail($id);
        $jp->delete();
        return redirect()->back()->with('success', 'Jeton proposé supprimé.');
    }

    public function update(Request $request, $id)
{
    $jeton = JetonPropose::findOrFail($id);
    $jeton->update($request->only(['nom', 'description', 'nombre_de_jetons']));
    return redirect()->back()->with('success', 'Jeton proposé modifié avec succès.');
}

}
