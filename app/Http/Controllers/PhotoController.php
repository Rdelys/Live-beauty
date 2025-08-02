<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Modele;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'photos.*' => 'image|max:5120'
        ]);


$modele = Modele::find(session('modele_id'));
if (!$modele) {
    return redirect()->route('modele.login')->withErrors(['auth' => 'Session expirée.']);
}
        if (!$modele) {
            return redirect()->route('modele.login')->withErrors(['auth' => 'Veuillez vous reconnecter.']);
        }

        $existingPhotos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos, true) ?? [];
        $newPhotos = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $newPhotos[] = $photo->store('photos', 'public');
            }
        }

        $modele->photos = array_merge($existingPhotos, $newPhotos);
        $modele->save();

        return back()->with('success', 'Photos ajoutées avec succès.');
    }

    public function delete($index)
{
    $modele = \App\Models\Modele::find(session('modele_id'));
    if (!$modele) {
        return redirect()->route('modele.login')->withErrors(['auth' => 'Session expirée. Veuillez vous reconnecter.']);
    }

    $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos, true) ?? [];

    if (isset($photos[$index])) {
        \Storage::disk('public')->delete($photos[$index]);
        unset($photos[$index]);
        $modele->photos = array_values($photos);
        $modele->save();
    }

    return back()->with('success', 'Photo supprimée.');
}

}
