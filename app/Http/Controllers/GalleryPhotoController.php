<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
            'type_flou' => 'nullable|string|max:50'
        ]);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('gallery_photos', 'public');

            GalleryPhoto::create([
                'modele_id' => $modeleId,
                'photo_url' => $path,
                'video_url' => null,
                'payant' => $request->input('payant', 0),
                'prix' => $request->input('prix', 0),
                'type_flou' => $request->input('type_flou'),
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

            GalleryPhoto::create([
                'modele_id' => $modeleId,
                'photo_url' => null,
                'video_url' => $path,
                'payant' => $request->input('payant', 0),
                'prix' => $request->input('prix', 0),
                'type_flou' => $request->input('type_flou'),
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

        return back()->with('success', 'Élément supprimé avec succès.');
    }
}
