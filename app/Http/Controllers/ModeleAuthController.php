<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ModeleAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('modele.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $modele = Modele::where('email', $request->email)->first();

        if ($modele && Hash::check($request->password, $modele->password)) {
    session(['modele_logged_in' => true, 'modele_id' => $modele->id]);
    
    $modele->update(['en_ligne' => true]); // ✅ Marquer comme en ligne

    return redirect()->route('modele.profil');
}


        return back()->withErrors(['email' => 'Identifiants invalides.']);
    }

    public function logout()
{
    $id = session('modele_id');
    if ($id) {
        $modele = Modele::find($id);
        if ($modele) {
            $modele->update(['en_ligne' => false]); // ✅ Marquer comme hors ligne
        }
    }

    Session::forget(['modele_logged_in', 'modele_id']);
    return redirect()->route('modele.login');
}


    public function profile()
    {
        $modele = Modele::findOrFail(session('modele_id'));
        return view('modele.profil', compact('modele'));
    }
}
