<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Modele;
    use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{

public function register(Request $request) {
    $request->validate([
        'pseudo' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'pseudo' => $request->pseudo,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // ✅ ENVOI DE L'EMAIL DE BIENVENUE
    Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));

    Auth::login($user);
    return redirect('/dashboard');
}

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Vérifier si banni
        if ($user->banni) {
            Auth::logout();
            return redirect()->route('home')->with('error', 'Votre compte est banni.');
        }

        return redirect('/dashboard');
    }

    // Mauvais identifiants
    return redirect()->route('home')->with('error', 'Email ou mot de passe incorrect.');
}



public function addTokens(Request $request, $id)
{
    $request->validate([
        'jetons' => 'required|integer|min:1'
    ]);

    $user = User::findOrFail($id);
    $user->jetons += $request->jetons;
    $user->save();

    return back()->with('success', 'Jetons ajoutés avec succès.');
}

public function toggleBan($id)
{
    $user = User::findOrFail($id);
    $user->banni = $user->banni ? 0 : 1;
    $user->save();

    return back()->with('success', $user->banni ? 'Utilisateur banni.' : 'Utilisateur débloqué.');
}
    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard() {
 $modeles = Modele::all();
    return view('dashboard', compact('modeles'));    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nom' => 'nullable|string|max:255',
        'prenoms' => 'nullable|string|max:255',
        'age' => 'nullable|integer',
        'pseudo' => 'required|string|max:255',
        'departement' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($request->only(['nom', 'prenoms', 'age', 'pseudo', 'departement', 'email']));

    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}

}
