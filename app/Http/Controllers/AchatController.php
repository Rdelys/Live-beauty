<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    public function acheter(Request $request, $modeleId)
    {
        try {
            $modele = Modele::findOrFail($modeleId);
            $user   = Auth::user();
            $prix   = $modele->prix_flou ?? $request->input('prix', 0);

            if ($user->jetons < $prix) {
                return response()->json(['success' => false, 'error' => 'Pas assez de jetons'], 403);
            }

            // Si déjà acheté en GLOBAL, ne pas débiter à nouveau
            $alreadyGlobal = Achat::where('user_id', $user->id)
                ->where('modele_id', $modele->id)
                ->where('type', 'global')
                ->exists();

            if ($alreadyGlobal) {
                return response()->json(['success' => true, 'message' => 'Galerie déjà débloquée']);
            }

            // transaction pour éviter la double dépense en cas de concurrence
            DB::transaction(function () use ($user, $modele, $prix) {
                // Verif verrouillée
                $exists = Achat::where('user_id', $user->id)
                    ->where('modele_id', $modele->id)
                    ->where('type', 'global')
                    ->lockForUpdate()
                    ->exists();

                if (!$exists) {
                    // débiter
                    $user->decrement('jetons', $prix);

                    Achat::create([
                        'user_id'   => $user->id,
                        'modele_id' => $modele->id,
                        'jetons'    => $prix,
                        'type'      => 'global',
                        'photo_path'=> '', // vide pour global
                    ]);
                }
            });

            $user->refresh();

            return response()->json([
                'success'     => true,
                'new_balance' => $user->jetons,
                'message'     => 'Galerie débloquée'
            ]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function acheterDetail(Request $request, $modeleId)
    {
        try {
            $modele = Modele::findOrFail($modeleId);
            $user   = Auth::user();
            $prix   = $modele->prix_flou_detail ?? $request->input('prix', 0);
            $photo  = $request->input('photo');

            if (empty($photo)) {
                return response()->json(['success' => false, 'error' => 'Photo manquante'], 422);
            }

            if ($user->jetons < $prix) {
                return response()->json(['success' => false, 'error' => 'Pas assez de jetons'], 403);
            }

            // Vérif si déjà acheté cette photo précise (type detail + même photo_path)
            $exists = Achat::where('user_id', $user->id)
                ->where('modele_id', $modele->id)
                ->where('type', 'detail')
                ->where('photo_path', $photo)
                ->exists();

            if ($exists) {
                return response()->json(['success' => true, 'message' => 'Photo déjà achetée']);
            }

            DB::transaction(function () use ($user, $modele, $prix, $photo) {
                $exists = Achat::where('user_id', $user->id)
                    ->where('modele_id', $modele->id)
                    ->where('type', 'detail')
                    ->where('photo_path', $photo)
                    ->lockForUpdate()
                    ->exists();

                if (!$exists) {
                    $user->decrement('jetons', $prix);

                    Achat::create([
                        'user_id'    => $user->id,
                        'modele_id'  => $modele->id,
                        'jetons'     => $prix,
                        'type'       => 'detail',
                        'photo_path' => $photo,
                    ]);
                }
            });

            $user->refresh();

            return response()->json([
                'success'     => true,
                'new_balance' => $user->jetons,
                'message'     => 'Photo achetée avec succès',
                'photo'       => $photo
            ]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function dashboard()
    {
        $modeles = Modele::all();
        $achatsGlobal = [];
        $achatsDetail = [];

        if (Auth::check()) {
            // Global = modèles pour lesquels l'utilisateur a acheté la galerie complète
            $achatsGlobal = Achat::where('user_id', Auth::id())
                ->where('type', 'global')
                ->pluck('modele_id')
                ->toArray();

            // Details = liste des photo_path achetées (pour décocher le flou individuel)
            $achatsDetail = Achat::where('user_id', Auth::id())
                ->where('type', 'detail')
                ->pluck('photo_path')
                ->toArray();
        }

        return view('dashboard', compact('modeles', 'achatsGlobal', 'achatsDetail'));
    }

    public function mesAchats()
{
    $user = auth()->user();

    // Tous les achats de l’utilisateur
    $achats = \App\Models\Achat::with('modele')
        ->where('user_id', $user->id)
        ->get();

    // Regrouper par modèle
    $groupes = $achats->groupBy('modele_id');

    return view('achats.mes', compact('groupes'));
}

public function acheterAlbum(Request $request, $albumId)
{
    try {
        $user = Auth::user();
        $album = \App\Models\Album::with('photos')->findOrFail($albumId);

        if ($album->etat !== 'payant') {
            return response()->json(['success' => false, 'error' => 'Cet album est gratuit'], 400);
        }

        $prix = $album->prix;

        // Vérification jetons
        if ($user->jetons < $prix) {
            return response()->json(['success' => false, 'error' => 'Pas assez de jetons'], 403);
        }

        // Vérifier si déjà acheté
        $albumsAchetes = $user->album_id ?? [];
        if (in_array($album->id, $albumsAchetes)) {
            return response()->json(['success' => true, 'message' => 'Album déjà acheté']);
        }

        DB::transaction(function () use ($user, $album, $prix, $albumsAchetes) {
            // Débit jetons
            $user->decrement('jetons', $prix);

            // Ajouter album au JSON
            $albumsAchetes[] = $album->id;
            $user->album_id = $albumsAchetes;
            $user->save();

            // Ajouter toutes les photos dans achats
            foreach ($album->photos as $photo) {
                Achat::create([
                    'user_id'    => $user->id,
                    'modele_id'  => $album->modele_id,
                    'jetons'     => 0,                 // déjà payé via l’album
                    'type'       => 'album',
                    'photo_path' => $photo->photo_url,
                ]);
            }
        });

        return response()->json([
            'success'     => true,
            'message'     => 'Album acheté avec succès',
            'new_balance' => $user->fresh()->jetons
        ]);

    } catch (\Throwable $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

}
