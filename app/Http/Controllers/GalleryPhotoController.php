<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Models\Modele;

class GalleryPhotoController extends Controller
{
    // Stocke des photos (déjà existant — inchangé fonctionnellement)
    public function store(Request $request, $modeleId)
{
    $request->validate([
        'photos' => 'required|array',
        'photos.*' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:8192', // 8MB max
        'payant' => ['nullable', Rule::in([0,1])],
        'prix' => 'nullable|numeric|min:0',
        'type_flou' => 'nullable|string|max:50',
        'album_id' => ['nullable','integer','exists:albums,id'],
    ]);

    // Récupère l'album_id (ou null)
    $albumId = $request->input('album_id') ?: null;

    foreach ($request->file('photos') as $photo) {
        $path = $photo->store('gallery_photos', 'public');

        // calcule position suivante pour ce modèle
        $max = GalleryPhoto::where('modele_id', $modeleId)->max('position_photo') ?? 0;
        $position = $max + 1;

        GalleryPhoto::create([
            'modele_id' => $modeleId,
            'photo_url' => $path,
            'video_url' => null,
            'payant' => $request->input('payant', 0),
            'prix' => $request->input('prix', 0),
            'type_flou' => $request->input('type_flou'),
            'position_photo' => $position,
            'album_id' => $albumId,
        ]);
    }

    return back()->with('success', 'Photos ajoutées avec succès !');
}


    // Stocke des vidéos (nouvelle méthode)
    public function storeVideo(Request $request, $modeleId)
    {
        $request->validate([
            'videos' => 'required|array',
            'videos.*' => 'required|mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/webm|max:51200', // 50 MB max
            'payant' => ['nullable', Rule::in([0,1])],
            'prix' => 'nullable|numeric|min:0',
            'type_flou' => 'nullable|string|max:50'
        ]);

        foreach ($request->file('videos') as $video) {
            $path = $video->store('gallery_videos', 'public');

            $max = GalleryPhoto::where('modele_id', $modeleId)->max('position_photo') ?? 0;
            $position = $max + 1;

            GalleryPhoto::create([
                'modele_id' => $modeleId,
                'photo_url' => null,
                'video_url' => $path,
                'payant' => $request->input('payant', 0),
                'prix' => $request->input('prix', 0),
                'type_flou' => $request->input('type_flou'),
                'position_photo' => $position,
            ]);

        }

        return back()->with('success', 'Vidéos ajoutées avec succès !');
    }

    // Suppression (gère photo et/ou vidéo)
    public function destroy(GalleryPhoto $galleryPhoto)
    {
        // Supprime le fichier physique s'il existe
        if ($galleryPhoto->photo_url) {
            Storage::disk('public')->delete($galleryPhoto->photo_url);
        }

        if ($galleryPhoto->video_url) {
            Storage::disk('public')->delete($galleryPhoto->video_url);
        }

        $galleryPhoto->delete();
        // après suppression -> réindexe les positions pour ce modele
        $modeleId = $galleryPhoto->modele_id;
        $photos = GalleryPhoto::where('modele_id', $modeleId)
            ->orderBy('position_photo', 'asc')
            ->get();

        $pos = 1;
        foreach ($photos as $p) {
            $p->position_photo = $pos++;
            $p->saveQuietly();
        }

        return back()->with('success', 'Élément supprimé avec succès.');
    }

    public function getGallery($modeleId)
{
    $photos = \App\Models\GalleryPhoto::where('modele_id', $modeleId)->get();

    $photoItems = $photos->whereNotNull('photo_url')->values();
    $videoItems = $photos->whereNotNull('video_url')->values();

    return response()->json([
        'photos' => $photoItems,
        'videos' => $videoItems,
    ]);
}


public function update(Request $request, $id)
{
    $item = GalleryPhoto::findOrFail($id);

    $item->update([
        'payant' => $request->payant,
        'prix' => $request->prix,
        'type_flou' => $request->type_flou,
    ]);

    return redirect()->back()->with('success', 'Élément mis à jour avec succès !');
}

public function reorder(Request $request)
{
    $data = $request->validate([
        'order' => 'required|array',
        'order.*.id' => 'required|integer|exists:gallery_photos,id',
        'order.*.position_photo' => 'required|integer|min:1',
    ]);

    // Option A: simple update dans une transaction
    DB::transaction(function () use ($data) {
        foreach ($data['order'] as $item) {
            \App\Models\GalleryPhoto::where('id', $item['id'])
                ->update(['position_photo' => $item['position_photo']]);
        }
    });

    return response()->json(['success' => true]);
}

public function storeAlbum(Request $request, $modeleId)
{
    // 🔒 Validation
    $request->validate([
        'nom' => 'required|string|max:255',
            'prix' => 'nullable|numeric|min:0',
    ]);

    // 🧩 Création de l'album
    Album::create([
        'modele_id' => $modeleId,
        'nom' => $request->nom,
            'prix' => $request->prix ?: null,
    ]);

    // 🔁 Récupération du modèle avec ses albums et photos
    $modele = Modele::with(['albums.photos' => function ($query) {
        $query->orderBy('created_at', 'desc');
    }])->findOrFail($modeleId);

    // ✨ Message de succès
    $successMessage = '✅ Album créé avec succès !';

    // 🔙 Retour sur la vue profil.blade.php avec mise à jour
return redirect()
    ->route('modele.profil')
    ->with('success', 'Album créé avec succès !');
}
}
