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

    'video_link'   => 'nullable|array',
    'video_link.*' => 'nullable|url',

    'video_file'   => 'nullable|array',
    'video_file.*' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg|max:102400',

    'photos'       => 'nullable|array',
    'photos.*'     => 'nullable|image|max:5120'
]);


    // Liens vidéos
    $videoLinks = $request->video_link ?? [];

    // Fichiers vidéos
    $videoFiles = [];
    if ($request->hasFile('video_file')) {
        foreach ($request->file('video_file') as $file) {
            $videoFiles[] = $file->store('videos', 'public');
        }
    }

    // Photos
    $photoPaths = [];
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $photoPaths[] = $photo->store('photos', 'public');
        }
    }

    Modele::create([
        'nom'         => $validated['nom'],
        'prenom'      => $validated['prenom'],
        'description' => $validated['description'],
        'email'       => $validated['email'],
        'password'    => Hash::make($validated['password']),
        'video_link'  => $videoLinks,
        'video_file'  => $videoFiles,
        'photos'      => $photoPaths,
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
$clients = User::select('id', 'nom', 'prenoms', 'jetons', 'email', 'pseudo', 'banni', 'created_at')->get();

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
    $newFiles = [];
    foreach ($request->file('video_file') as $file) {
        $newFiles[] = $file->store('videos', 'public');
    }
    $modele->video_file = array_merge((array)$modele->video_file, $newFiles);
}
    if ($request->has('video_link')) {
$currentLinks = is_array($modele->video_link) ? $modele->video_link : (json_decode($modele->video_link, true) ?: []);
$modele->video_link = array_merge($currentLinks, $request->video_link ?? []);
    }

    if ($request->hasFile('photos')) {
        $photosPaths = [];
        foreach ($request->file('photos') as $photo) {
            $photosPaths[] = $photo->store('photos', 'public');
        }
$modele->photos = $photosPaths;
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
public function uploadVideos(Request $request, $id)
{
    $request->validate([
        'video_file' => 'nullable',
'video_file.*' => 'file|mimetypes:video/mp4,video/webm,video/ogg|max:102400',

    ]);

    $modele = Modele::findOrFail($id);

    $links = is_array($modele->video_link) ? $modele->video_link : json_decode($modele->video_link ?? '[]', true);
    $files = is_array($modele->video_file) ? $modele->video_file : json_decode($modele->video_file ?? '[]', true);

    if ($request->has('video_link')) {
        foreach ($request->video_link as $link) {
            if (!empty($link)) $links[] = $link;
        }
    }

    if ($request->hasFile('video_file')) {
    $files = is_array($request->file('video_file'))
        ? $request->file('video_file')
        : [$request->file('video_file')];

    foreach ($files as $file) {
        $path = $file->store('videos', 'public');
        // Ici, sauvegarde le chemin en base si besoin
    }
}


    $modele->video_link = $links;
    $modele->video_file = $files;
    $modele->save();

    return back()->with('success', 'Vidéos ajoutées avec succès.');
}


}

