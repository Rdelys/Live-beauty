<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryPhotoController extends Controller
{
    public function store(Request $request, $modeleId)
    {
        $request->validate([
            'photos.*' => 'required|image|max:4096',
            'payant' => 'required|in:0,1',
            'prix' => 'nullable|numeric|min:0',
            'type_flou' => 'nullable|string|max:50'
        ]);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('gallery_photos', 'public');
            GalleryPhoto::create([
                'modele_id' => $modeleId,
                'photo_url' => $path,
                'payant' => $request->payant,
                'prix' => $request->prix,
                'type_flou' => $request->type_flou,
            ]);
        }

        return back()->with('success', 'Photos ajoutées avec succès !');
    }

    public function destroy(GalleryPhoto $galleryPhoto)
    {
        Storage::disk('public')->delete($galleryPhoto->photo_url);
        $galleryPhoto->delete();
        return back()->with('success', 'Photo supprimée avec succès.');
    }
}
