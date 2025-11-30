<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\GalleryPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'nullable|numeric|min:0'
        ]);

       $album->update([
    'nom' => $request->nom,
    'etat' => $request->etat,
    'type_flou' => $request->type_flou,
            'prix' => $request->prix ?: null,
]);


        return redirect()->back()->with('success', 'Album mis à jour avec succès !');
    }

    public function destroy(Album $album)
    {
        DB::transaction(function () use ($album) {
            // Récupère les photos liées
            $photos = $album->photos()->get();

            foreach ($photos as $photo) {
                // Supprime fichiers physiques s'ils existent
                if ($photo->photo_url) {
                    Storage::disk('public')->delete($photo->photo_url);
                }
                if ($photo->video_url) {
                    Storage::disk('public')->delete($photo->video_url);
                }
                // Supprime l'enregistrement
                $photo->delete();
            }

            // Enfin supprime l'album
            $album->delete();
        });

        return redirect()->back()->with('success', 'Album et ses photos supprimés.');
    }
}
