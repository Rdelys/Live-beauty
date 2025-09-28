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
    $user = Auth::user();

    // Achats globaux (id des modèles débloqués totalement)
    $achatsGlobal = \DB::table('galleryAchat')
        ->where('user_id', $user->id)
        ->where('status', 1)
        ->pluck('modele_id')
        ->toArray();

    // Achats détail (photos précises débloquées)
    $achatsDetail = \DB::table('galleryAchat')
        ->where('user_id', $user->id)
        ->where('status', 1)
        ->pluck('photo') // à adapter selon ta colonne
        ->toArray();

    $modeles = Modele::all();

    return view('dashboard', compact('modeles', 'achatsGlobal', 'achatsDetail'));
}

}
