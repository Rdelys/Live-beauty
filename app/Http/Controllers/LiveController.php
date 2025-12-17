<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Live;
use App\Models\Modele;
use App\Models\Jeton;
use App\Models\ShowPrive;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // ← AJOUTER CETTE LIGNE
use App\Models\HistoriqueLive; // ← AJOUTER CETTE LIGNE


class LiveController extends Controller
{
    public function start(Request $request)
    {
        $modele = Modele::find(session('modele_id'));
        
        if (!$modele) {
            return response()->json([
                'success' => false,
                'message' => 'Modèle non trouvé.'
            ]);
        }

        // Vérifier si le modèle n'est pas déjà en live
        if ($modele->en_live) {
            return response()->json([
                'success' => false,
                'message' => 'Le modèle est déjà en live.'
            ]);
        }

        // Mettre à jour le statut du modèle
        $modele->en_live = true;
        $modele->prive = 0; // S'assurer qu'il n'est pas en privé
        $modele->save();
        
        // Enregistrement dans l'historique (début du live)
        HistoriqueLive::create([
            'modele_id' => $modele->id,
            'statut' => 'commencer',
            'is_prive' => false,
            'date_commencement' => Carbon::now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Live démarré avec succès.'
        ]);
    }

    public function stop(Request $request)
    {
        $modele = Modele::find(session('modele_id'));
        
        if (!$modele) {
            return response()->json([
                'success' => false,
                'message' => 'Modèle non trouvé.'
            ]);
        }

        // Mettre à jour le statut du modèle
        $modele->en_live = false;
        $modele->prive = 0;
        $modele->save();
        
        // Récupérer le dernier live "commencer" pour ce modèle
        $dernierLive = HistoriqueLive::where('modele_id', $modele->id)
            ->where('statut', 'commencer')
            ->where('is_prive', false)
            ->latest('date_commencement')
            ->first();

        if ($dernierLive) {
            // Créer un nouvel enregistrement pour la fin du live
            HistoriqueLive::create([
                'modele_id' => $modele->id,
                'statut' => 'fin',
                'is_prive' => false,
                'date_commencement' => $dernierLive->date_commencement, // Garder la même date de début
                'date_fin' => Carbon::now(), // Date actuelle pour la fin
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Live arrêté avec succès.'
        ]);
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
        $request->validate([
            'modele_id' => 'required|exists:modeles,id'
        ]);

        $modele = Modele::findOrFail($request->modele_id);
        $user = Auth::user();

        // Vérifier si le modèle est en live
        if (!$modele->en_live) {
            return response()->json([
                'success' => false,
                'message' => "Le modèle n'est pas en live actuellement."
            ], 400);
        }

        // Vérifier si le modèle n'est pas déjà en privé
        if ($modele->prive) {
            return response()->json([
                'success' => false,
                'message' => "Le modèle est déjà en show privé."
            ], 400);
        }

        // Calcul coût par minute
        if (empty($modele->duree_show_privee) || $modele->duree_show_privee == 0) {
            return response()->json([
                'success' => false,
                'message' => "Durée du show privée non définie."
            ], 400);
        }

        $coutParMinute = ceil($modele->nombre_jetons_show_privee / $modele->duree_show_privee);
        $debitInitial = $coutParMinute * 5; // 5 minutes d'avance

        if ($user->jetons < $debitInitial) {
            return response()->json([
                'success' => false,
                'message' => "Vous n'avez pas assez de jetons pour démarrer un show privé (5 min d'avance requises)."
            ], 400);
        }

        // 💸 Débit immédiat
        $user->jetons -= $debitInitial;
        $user->save();

        // Mettre à jour le modèle
        $modele->prive = 1;
        $modele->save();

        // Enregistrement dans l'historique pour début de privé
        HistoriqueLive::create([
            'modele_id' => $modele->id,
            'statut' => 'commencer',
            'is_prive' => true,
            'date_commencement' => Carbon::now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Show privé démarré. {$debitInitial} jetons débités pour les 5 premières minutes.",
            'jetons_restants' => $user->jetons,
            'cout_par_minute' => $coutParMinute
        ]);
    }


public function stopPrivate(Request $request)
    {
        $request->validate([
            'modele_id' => 'required|exists:modeles,id'
        ]);

        $modele = Modele::findOrFail($request->modele_id);
        $user = Auth::user();

        // Mettre à jour le modèle
        $modele->prive = 0;
        $modele->save();

        // Récupérer le dernier show privé "commencer" pour ce modèle
        $dernierPrive = HistoriqueLive::where('modele_id', $modele->id)
            ->where('statut', 'commencer')
            ->where('is_prive', true)
            ->latest('date_commencement')
            ->first();

        if ($dernierPrive) {
            // Créer un nouvel enregistrement pour la fin du show privé
            HistoriqueLive::create([
                'modele_id' => $modele->id,
                'statut' => 'fin',
                'is_prive' => true,
                'date_commencement' => $dernierPrive->date_commencement, // Garder la même date de début
                'date_fin' => Carbon::now(), // Date actuelle pour la fin
            ]);

            // Calculer les jetons à rembourser si fin prématurée
            $debut = Carbon::parse($dernierPrive->date_commencement);
            $fin = Carbon::now();
            $minutesEcoulees = $debut->diffInMinutes($fin);
            
            if ($minutesEcoulees < 5) {
                $coutParMinute = ceil($modele->nombre_jetons_show_privee / $modele->duree_show_privee);
                $minutesNonUtilisees = 5 - $minutesEcoulees;
                $remboursement = $coutParMinute * $minutesNonUtilisees;
                
                $user->jetons += $remboursement;
                $user->save();
            }
        }

        return response()->json([
            'success' => true, 
            'message' => 'Show privé terminé.',
            'jetons_restants' => $user->jetons
        ]);
    }


public function canStartPrivate(Request $request)
    {
        $request->validate([
            'modele_id' => 'required|exists:modeles,id'
        ]);

        $user = Auth::user();
        $modele = Modele::findOrFail($request->modele_id);

        // Vérifier si le modèle est en live
        if (!$modele->en_live) {
            return response()->json([
                'canStart' => false,
                'message' => "Le modèle n'est pas en live actuellement."
            ]);
        }

        // Vérifier si le modèle est déjà en privé
        if ($modele->prive) {
            return response()->json([
                'canStart' => false,
                'message' => "Le modèle est déjà en show privé."
            ]);
        }

        // Éviter division par zéro
        if (empty($modele->duree_show_privee) || $modele->duree_show_privee == 0) {
            return response()->json([
                'canStart' => false,
                'message' => "Durée du show privée non définie pour ce modèle."
            ]);
        }

        $coutParMinute = ceil($modele->nombre_jetons_show_privee / $modele->duree_show_privee);
        $debitInitial = $coutParMinute * 5; // 5 minutes d'avance

        if ($user->jetons >= $debitInitial) {
            return response()->json([
                'canStart' => true,
                'cout_initial' => $debitInitial,
                'cout_par_minute' => $coutParMinute
            ]);
        } else {
            return response()->json([
                'canStart' => false,
                'message' => "Vous n'avez pas assez de jetons pour démarrer un show privé.",
                'jetons_requis' => $debitInitial,
                'jetons_disponibles' => $user->jetons
            ]);
        }
    }

}
