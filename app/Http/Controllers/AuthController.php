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

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return back()->withErrors(['email' => 'Identifiants invalides']);
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
