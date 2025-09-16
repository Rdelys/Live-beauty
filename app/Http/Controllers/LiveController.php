<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Live;
use App\Models\Modele;
use App\Models\Jeton;
use App\Models\ShowPrive;
use Illuminate\Support\Facades\Auth;


class LiveController extends Controller
{
    public function start(Request $request)
    {
        $modele = Modele::find(session('modele_id'));
        if ($modele) {
            $modele->en_live = true;
            $modele->save();
        }

        return response()->json(['success' => true]);
    }

    public function stop(Request $request)
    {
        $modele = Modele::find(session('modele_id'));
        if ($modele) {
            $modele->en_live = false;
            $modele->save();
        }

        return response()->json(['success' => true]);
    }

    public function active()
    {
        $lives = Modele::where('en_live', true)->get(['id', 'prenom']);
        return response()->json($lives);
    }

    public function show($id)
{
    $modele = Modele::findOrFail($id);

    $jetons = Jeton::whereNull('modele_id')
                   ->orWhere('modele_id', $modele->id)
                   ->get();

    return view('live.show', [
        'modele' => $modele,
        'jetons' => $jetons,
    ]);
}
public function showPrivate($modeleId, $showPriveId)
{
    $modele = Modele::findOrFail($modeleId);

    $jetons = Jeton::whereNull('modele_id')
                   ->orWhere('modele_id', $modele->id)
                   ->get();

    return view('live.show', [
        'modele' => $modele,
        'jetons' => $jetons,
        'showPriveId' => $showPriveId // on passe l’ID du show privé
    ]);
}

public function activePrivate()
{
    $user = Auth::user();

    // Récupérer uniquement les shows privés où ce user est le client concerné
    $shows = ShowPrive::where('is_live', true)
        ->where('user_id', $user->id)
        ->with('modele:id,prenom')
        ->get();

    return response()->json($shows);
}


}
