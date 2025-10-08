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
        $modele->prive = 0; // ✅ remet à 0 à la fin
        $modele->save();
    }

    return response()->json(['success' => true]);
}


    public function active()
{
    $lives = Modele::where('en_live', true)->get(['id', 'prenom', 'prive']);
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

public function debiterJetonsLive(Request $request)
{
    $user = Auth::user();
    $modele = Modele::findOrFail($request->modele_id);

    // 🛑 1️⃣ Vérifie si le modèle est toujours en live
    if (!$modele->en_live) {
        return response()->json([
            'success' => false,
            'message' => "🚫 Le modèle a arrêté le live. Aucun jeton ne sera débité."
        ]);
    }

    // 💰 2️⃣ Calcul du coût par minute (sécurisé)
    if (empty($modele->duree_show_privee) || $modele->duree_show_privee == 0) {
        return response()->json([
            'success' => false,
            'message' => "⛔ Durée du show privée non définie."
        ]);
    }

    $coutParMinute = ceil($modele->nombre_jetons_show_privee / $modele->duree_show_privee);

    // 💸 3️⃣ Vérifie si le client a assez de jetons
    if ($user->jetons < $coutParMinute) {
        return response()->json([
            'success' => false,
            'message' => "💸 Plus assez de jetons. Le show privé s'arrête."
        ]);
    }

    // ✅ 4️⃣ Débit des jetons
    $user->jetons -= $coutParMinute;
    $user->save();

    return response()->json([
        'success' => true,
        'jetons_restants' => $user->jetons,
        'debit' => $coutParMinute,
        'chat_message' => "⏳ -{$coutParMinute} jetons déduits. Solde restant : {$user->jetons}"
    ]);
}

public function startPrivate(Request $request)
{
    $modele = \App\Models\Modele::findOrFail($request->modele_id);
    $user = Auth::user();

    // 🟢 Passer le modèle en privé
    $modele->prive = 1;
    $modele->save();

    // 💰 Calcul coût par minute
    if (empty($modele->duree_show_privee) || $modele->duree_show_privee == 0) {
        return response()->json([
            'success' => false,
            'message' => "⛔ Durée du show privée non définie."
        ]);
    }

    $coutParMinute = ceil($modele->nombre_jetons_show_privee / $modele->duree_show_privee);
    $debitInitial = $coutParMinute * 5; // 5 minutes d’avance

    if ($user->jetons < $debitInitial) {
        return response()->json([
            'success' => false,
            'message' => "💸 Vous n’avez pas assez de jetons pour démarrer un show privé (5 min d’avance requises)."
        ]);
    }

    // 💸 Débit immédiat
    $user->jetons -= $debitInitial;
    $user->save();

    return response()->json([
        'success' => true,
        'message' => "🎥 Show privé démarré. {$debitInitial} jetons débités pour les 5 premières minutes.",
        'jetons_restants' => $user->jetons
    ]);
}


public function stopPrivate(Request $request)
{
    $modele = \App\Models\Modele::findOrFail($request->modele_id);
    $modele->prive = 0;
    $modele->save();

    return response()->json(['success' => true, 'message' => 'Le show privé est terminé.']);
}


public function canStartPrivate(Request $request)
{
    $user = Auth::user();
    $modele = Modele::findOrFail($request->modele_id);

    // coût minimum d'une minute
    // éviter division par zéro
    if (empty($modele->duree_show_privee) || $modele->duree_show_privee == 0) {
        return response()->json([
            'success' => false,
            'message' => "⛔ Durée du show privée non définie pour ce modèle."
        ], 400);
    }

    $coutParMinute = ceil($modele->nombre_jetons_show_privee / $modele->duree_show_privee);

    if ($user->jetons >= $coutParMinute) {
        return response()->json(['canStart' => true]);
    } else {
        return response()->json([
            'canStart' => false,
            'message' => "⚠️ Vous n'avez pas assez de jetons pour démarrer un show privé."
        ]);
    }
}


}
