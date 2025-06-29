<?php

namespace App\Http\Controllers;

use App\Models\Jeton;
use Illuminate\Http\Request;

class JetonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom.*' => 'required|string|max:255',
            'description.*' => 'nullable|string|max:1000',
            'prix.*' => 'required|numeric|min:0',
        ]);

        foreach ($request->nom as $index => $nom) {
            Jeton::create([
                'nom' => $nom,
                'description' => $request->description[$index],
                'prix' => $request->prix[$index],
            ]);
        }

        return redirect()->route('admin')->with('success', 'Jetons ajoutés avec succès.');
    }
}
