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

}

