<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Live;
use App\Models\Modele;
use App\Models\Jeton;
use Illuminate\Support\Facades\Auth;

class LiveController extends Controller
{
    public function start(Request $request)
    {
        $modele = Modele::find(session('modele_id'));
        if ($modele) {
            $modele->en_live = true;
            $modele->save();
        }

        return response()->json(['success' => true]);
    }

    public function stop(Request $request)
    {
        $modele = Modele::find(session('modele_id'));
        if ($modele) {
            $modele->en_live = false;
            $modele->save();
        }

        return response()->json(['success' => true]);
    }

    public function active()
    {
        $lives = Modele::where('en_live', true)->get(['id', 'prenom']);
        return response()->json($lives);
    }

    public function show($id)
{
    $modele = Modele::findOrFail($id);
    $jetons = Jeton::all(); // assurez-vous que cette ligne est bien là

    return view('live.show', [
        'modele' => $modele,
        'jetons' => $jetons, // ✅ passe la variable à la vue
    ]);
}

}
