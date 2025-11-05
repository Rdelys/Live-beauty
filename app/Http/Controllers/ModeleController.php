<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Jeton;
use App\Models\User;
use App\Models\ShowPrive;
use App\Models\Achat;
use Carbon\Carbon;
use App\Models\JetonPropose;
use App\Models\HistoriqueJeton;


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

        'nombre_jetons_show_privee' => 'nullable|integer|min:0',
        'duree_show_privee' => 'nullable|integer|min:1|max:240',
        'age' => 'nullable|integer|min:18|max:99',
        'taille' => 'nullable|string|max:10',
        'silhouette' => 'nullable|string|max:50',
        'poitrine' => 'nullable|string|max:50',
        'fesse' => 'nullable|string|max:50',

        // ✅ modification ici : accepte un tableau de langues
        'langue' => 'nullable|array',
        'langue.*' => 'string|max:10',

        'services' => 'nullable|string',

        'video_link'   => 'nullable|array',
        'video_link.*' => 'nullable|url',

        'video_file'   => 'nullable|array',
        'video_file.*' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg|max:102400',

        'photos'       => 'nullable|array',
        'photos.*'     => 'nullable|image|max:5120',

        // ✅ Nouveaux champs
        'mode' => 'nullable|boolean',
        'type_flou' => 'nullable|string|in:soft,strong,pixel',
        'prix_flou' => 'nullable|numeric|min:0',
        'prix_flou_detail' => 'nullable|numeric|min:0',
    ]);

    // ✅ Conversion du tableau de langues en chaîne (ex: "FR,EN,ES")
    $langues = $request->langue ? implode(',', $request->langue) : null;

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

    // ✅ Création du modèle
    Modele::create([
        'nom'         => $validated['nom'],
        'prenom'      => $validated['prenom'],
        'description' => $validated['description'],
        'email'       => $validated['email'],
        'password'    => Hash::make($validated['password']),
        'age'         => $validated['age'] ?? null,
        'taille'      => $validated['taille'] ?? null,
        'silhouette'  => $validated['silhouette'] ?? null,
        'poitrine'    => $validated['poitrine'] ?? null,
        'fesse'       => $validated['fesse'] ?? null,

        // ✅ Sauvegarde propre des langues
        'langue'      => $langues,

        'services'    => $validated['services'] ?? null,
        'video_link'  => $videoLinks,
        'video_file'  => $videoFiles,
        'photos'      => $photoPaths,

        'nombre_jetons_show_privee' => $validated['nombre_jetons_show_privee'] ?? null,
        'duree_show_privee'         => $validated['duree_show_privee'] ?? null,

        // ✅ Nouveaux champs
        'mode'       => $request->boolean('mode') ? 1 : 0,
        'type_flou'  => $validated['type_flou'] ?? null,
        'prix_flou'  => $validated['prix_flou'] ?? null,
        'prix_flou_detail' => $validated['prix_flou_detail'] ?? null,
    ]);

    return redirect()->back()->with('success', 'Modèle ajouté avec succès !');
}


    public function index(Request $request)
{
    // Données principales du dashboard
    $modeles = Modele::all();
    $jetons = Jeton::all();
    $shows = ShowPrive::with('user', 'modele')->get();
    $achats = Achat::with(['user', 'modele'])->latest()->get();
    $jetonsProposes = JetonPropose::where('prise', 0)->get();

    $nombreDeModeles = $modeles->count();
    $nombreDeJetons = $jetons->count();
    $nombreDeClients = User::count();
    $nombreAchatsPhotos = Achat::count();
    $nombrejetonsProposes = JetonPropose::count();

    $clients = User::select('id', 'nom', 'prenoms', 'jetons', 'email', 'pseudo', 'banni', 'created_at')->get();

    // === 🔥 Partie Historique Jetons ===
    $query = HistoriqueJeton::with(['user', 'modele'])->latest();

    // Filtre modèle (optionnel)
    if ($request->filled('modele_id')) {
        $query->where('modele_id', $request->modele_id);
    }

    $historiques = $query->paginate(20);
    $totalJetons = (clone $query)->sum('nombre_jetons');

    // Envoi de toutes les données à la vue
    return view('admin', compact(
        'modeles',
        'jetonsProposes',
        'shows',
        'jetons',
        'nombreDeModeles',
        'nombreDeJetons',
        'nombreDeClients',
        'clients',
        'achats',
        'nombreAchatsPhotos',
        'nombrejetonsProposes',
        'historiques',
        'totalJetons'
    ));
}



    public function edit($id)
    {
        $modele = Modele::findOrFail($id);
        return view('admin.edit-modele', compact('modele'));
    }

    public function update(Request $request, $id)
{
    $modele = Modele::findOrFail($id);

    // ✅ Validation mise à jour
    $validated = $request->validate([
        'nom'        => 'nullable|string|max:255',
        'prenom'     => 'nullable|string|max:255',
        'description'=> 'nullable|string',
        'age'        => 'nullable|integer|min:18|max:99',
        'taille'     => 'nullable|string|max:10',
        'silhouette' => 'nullable|string|max:50',
        'poitrine'   => 'nullable|string|max:50',
        'fesse'      => 'nullable|string|max:50',

        // ✅ modification ici — tableau au lieu de string
        'langue'     => 'nullable|array',
        'langue.*'   => 'string|max:10',

        'services'   => 'nullable|string',
        'email'      => 'nullable|email',

        'nombre_jetons_show_privee' => 'nullable|integer|min:0',
        'duree_show_privee'         => 'nullable|integer|min:1|max:240',

        'mode'              => 'nullable|boolean',
        'type_flou'         => 'nullable|string|in:soft,strong,pixel',
        'prix_flou'         => 'nullable|numeric|min:0',
        'prix_flou_detail'  => 'nullable|numeric|min:0',
    ]);

    // ✅ Conversion du tableau de langues en chaîne
    $langues = $request->langue ? implode(',', $request->langue) : null;

    // ✅ Remplissage du modèle
    $modele->fill($validated);
    $modele->langue = $langues;

    // ✅ Correction : assigner séparément les booléens et valeurs numériques
    $modele->mode = $request->boolean('mode') ? 1 : 0;
    $modele->prix_flou = $request->filled('prix_flou') ? floatval($request->prix_flou) : null;
    $modele->prix_flou_detail = $request->filled('prix_flou_detail') ? floatval($request->prix_flou_detail) : null;

    // ✅ Gestion des vidéos (fusion avec existantes)
    if ($request->hasFile('video_file')) {
        $newFiles = [];
        foreach ($request->file('video_file') as $file) {
            $newFiles[] = $file->store('videos', 'public');
        }

        $currentFiles = is_array($modele->video_file)
            ? $modele->video_file
            : (json_decode($modele->video_file, true) ?: []);

        $modele->video_file = array_merge($currentFiles, $newFiles);
    }

    // ✅ Fusion des liens vidéos
    if ($request->has('video_link')) {
        $currentLinks = is_array($modele->video_link)
            ? $modele->video_link
            : (json_decode($modele->video_link, true) ?: []);

        $modele->video_link = array_merge($currentLinks, $request->video_link ?? []);
    }

    // ✅ Photos (remplacement complet si nouvelles envoyées)
    if ($request->hasFile('photos')) {
        $photosPaths = [];
        foreach ($request->file('photos') as $photo) {
            $photosPaths[] = $photo->store('photos', 'public');
        }
        $modele->photos = $photosPaths;
    }

    $modele->save();

    return redirect()->back()->with('success', 'Mise à jour avec succès !');
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
                // TODO: sauvegarder dans $files si besoin
            }
        }

        $modele->video_link = $links;
        $modele->video_file = $files;
        $modele->save();

        return back()->with('success', 'Vidéos ajoutées avec succès.');
    }
    public function achats() {
    $achats = Achat::with(['user','modele'])->latest()->get();
    return view('admin.achats', compact('achats'));
}

public function achatsParJour(Request $request) {
    $days = $request->get('days', 30);

    $data = Achat::selectRaw('DATE(created_at) as date, SUM(jetons) as total')
        ->where('created_at', '>=', Carbon::now()->subDays($days))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    return response()->json([
        'labels' => $data->pluck('date')->map(fn($d)=>Carbon::parse($d)->format('d/m'))->toArray(),
        'data'   => $data->pluck('total')->toArray(),
    ]);
}
}
