<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Hash;
use App\Models\Jeton;
use App\Models\User;


class ModeleController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
    'nom' => 'required|string|max:255',
    'prenom' => 'required|string|max:255',
    'description' => 'required|string',
    'email' => 'required|email|unique:modeles,email',
    'password' => 'required|string|min:6',
    'video_link' => 'nullable|url',
    'video_file' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg|max:102400',
    'photos.*' => 'nullable|image|max:5120'
]);


        // Enregistrement des fichiers
        $videoPath = $request->hasFile('video_file') ? $request->file('video_file')->store('videos', 'public') : null;

        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('photos', 'public');
            }
        }


Modele::create([
    'nom' => $validated['nom'],
    'prenom' => $validated['prenom'],
    'description' => $validated['description'],
    'email' => $validated['email'],
    'password' => Hash::make($validated['password']),
    'video_link' => $validated['video_link'] ?? null,
    'video_file' => $videoPath,
    'photos' => json_encode($photoPaths),
]);


        return redirect()->back()->with('success', 'Modèle ajouté avec succès !');
    }

    public function index()
{
    $modeles = Modele::all();
    $jetons = Jeton::all();
    $nombreDeModeles = $modeles->count();  // Nombre de modèles
    $nombreDeJetons = $jetons->count();    // Nombre de jetons
    $nombreDeClients = User::count(); // ✅ total clients
    $clients = User::select('nom', 'prenoms', 'jetons','pseudo', 'created_at')->get();

    return view('admin', compact('modeles', 'jetons', 'nombreDeModeles', 'nombreDeJetons', 'nombreDeClients',
        'clients'));
}


public function edit($id)
{
    $modele = Modele::findOrFail($id);
    return view('admin.edit-modele', compact('modele'));
}
public function update(Request $request, $id)
{
    $modele = Modele::findOrFail($id);
    $modele->nom = $request->nom;
    $modele->prenom = $request->prenom;
    $modele->description = $request->description;
    $modele->video_link = $request->video_link;

    if ($request->hasFile('video_file')) {
        $modele->video_file = $request->file('video_file')->store('videos', 'public');
    }

    if ($request->hasFile('photos')) {
        $photosPaths = [];
        foreach ($request->file('photos') as $photo) {
            $photosPaths[] = $photo->store('photos', 'public');
        }
        $modele->photos = json_encode($photosPaths);
    }

    $modele->save();

    return redirect()->route('admin')->with('success', 'Modèle mis à jour.');
}
public function destroy($id)
{
    $modele = Modele::findOrFail($id);
    $modele->delete();

    return redirect()->route('admin')->with('success', 'Modèle supprimé.');
}

    public function show($id)
    {
        $modele = Modele::findOrFail($id);
        return view('modele.show', compact('modele'));
    }
public function accueil()
{
    $modeles = Modele::all();
    return view('home', compact('modeles'));
}

}

