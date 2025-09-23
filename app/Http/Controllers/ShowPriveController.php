<?php

// app/Http/Controllers/ShowPriveController.php
namespace App\Http\Controllers;

use App\Models\ShowPrive;
use App\Models\User;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShowPriveController extends Controller
{
    public function reserver(Request $request)
    {
        $user = Auth::user();
        $modele = Modele::findOrFail($request->modele_id);

        // Calcul coût
        $duree = (strtotime($request->fin) - strtotime($request->debut)) / 60;
        if ($duree <= 0) {
            return back()->with('error', 'Durée invalide.');
        }

        $tranches = ceil($duree / ($modele->duree_show_privee ?? 30));
        $jetonsTotal = $tranches * ($modele->nombre_jetons_show_privee ?? 0);

        // Vérif jetons
        if ($user->jetons < $jetonsTotal) {
            return back()->with('error', 'Nombre de jetons insuffisant.');
        }

        // Déduction des jetons
        $user->jetons -= $jetonsTotal;
        $user->save();

        // Enregistrement
        $show = ShowPrive::create([
            'user_id'      => $user->id,
            'modele_id'    => $modele->id,
            'date'         => $request->date,
            'debut'        => $request->debut,
            'fin'          => $request->fin,
            'duree'        => $duree,
            'jetons_total' => $jetonsTotal,
            'etat'         => 'en_attente',
        ]);

        // Mails
        Mail::raw("Vous avez un nouveau show privé prévu le {$request->date} de {$request->debut} à {$request->fin}.", function ($msg) use ($modele) {
            $msg->to($modele->email)->subject("Nouveau show privé");
        });

        Mail::raw("Votre show privé avec {$modele->prenom} est confirmé pour le {$request->date} de {$request->debut} à {$request->fin}.", function ($msg) use ($user) {
            $msg->to($user->email)->subject("Confirmation show privé");
        });

        return back()->with('success', "Show privé réservé avec succès !");
    }

    public function terminer($id)
{
    $show = ShowPrive::findOrFail($id);
    $show->etat = 'Terminer';   // ou 'Terminé'
    $show->fin = now();
    $show->save();

    return response()->json(['success' => true, 'etat' => 'termine']);
}

public function pause($id)
{
    $show = ShowPrive::findOrFail($id);
    $show->etat = 'En pause';    // ou 'Pause'
    $show->save();

    return response()->json(['success' => true, 'etat' => 'pause']);
}

public function demarrer($id)
{
    $show = ShowPrive::findOrFail($id);
    $show->etat = 'En cours';   // ⚡ démarre le live privé
    $show->save();

    return response()->json(['success' => true, 'etat' => 'en_cours']);
}

// app/Http/Controllers/ShowPriveController.php

public function getShowPrive($id)
{
    $show = ShowPrive::findOrFail($id);
    return response()->json($show);
}

public function decaler(Request $request, $id)
{
    $show = ShowPrive::findOrFail($id);

    $date = $request->date;
    $debut = $request->debut;

    // Validation : ne peut pas être dans le passé si aujourd'hui
    if ($date === date('Y-m-d') && strtotime($debut) <= time()) {
        return response()->json(['success'=>false, 'message'=>'Impossible de choisir une heure passée.']);
    }

    // Calcul fin automatiquement
    $finTimestamp = strtotime($debut) + ($show->duree * 60);
    $fin = date('H:i', $finTimestamp);

    $show->update([
        'date' => $date,
        'debut' => $debut,
        'fin' => $fin
    ]);

    // Envoi mail au modèle et à l'utilisateur
    Mail::raw("Le show privé prévu avec {$show->modele->prenom} a été décalé au {$date} de {$debut} à {$fin}.", function($msg) use ($show) {
        $msg->to($show->user->email)->subject("Show privé décalé");
    });

    Mail::raw("Votre show privé avec {$show->user->nom} a été décalé au {$date} de {$debut} à {$fin}.", function($msg) use ($show) {
        $msg->to($show->modele->email)->subject("Show privé décalé");
    });

    return response()->json(['success'=>true]);
}

// app/Http/Controllers/ShowPriveController.php
public function debiterJetons($showPriveId) {
    $show = ShowPrive::findOrFail($showPriveId);
    $user = $show->user; // client lié au show
    $modele = $show->modele;

    // calcule coût par minute
    $coutParMinute = $modele->nombre_jetons_show_privee / $modele->duree_show_privee;

    if ($user->jetons >= $coutParMinute) {
        $user->jetons -= $coutParMinute;
        $user->save();

        return response()->json([
            'success' => true,
            'jetons_restants' => $user->jetons,
            'debit' => $coutParMinute
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => "Solde insuffisant"
        ]);
    }
}

public function terminerShow($showPriveId) {
    $show = ShowPrive::findOrFail($showPriveId);
    $show->etat = "Terminer";
    $show->fin = now();
    $show->save();

    return response()->json(['success' => true]);
}

}

