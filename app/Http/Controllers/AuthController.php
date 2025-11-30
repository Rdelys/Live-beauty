<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Modele;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Cache;


class AuthController extends Controller
{

public function register(Request $request)
{
    $data = $request->validate([
        'pseudo'   => ['required','string','max:255'],
        'email'    => ['required','email','max:255','unique:users,email'],
        'password' => ['required','string','min:6'],
    ]);

    // Génère un code à 6 chiffres et le stocke 10 min (lié à l'email)
    $code = random_int(100000, 999999);
    Cache::put('verify_code_'.$data['email'], $code, now()->addMinutes(10));

    // Stocke temporairement les données d’inscription côté session
    session([
        'registration_data' => [
            'pseudo'   => $data['pseudo'],
            'email'    => $data['email'],
            'password' => $data['password'], // sera hashé après vérif
        ],
        'verify_attempts' => 0,
        'last_resend_at'  => null,
    ]);

    // Envoi mail du code
    Mail::to($data['email'])->send(new VerificationCodeMail($code));

    // Revient sur la page d’accueil avec un flag pour ouvrir la modal de vérification
    return redirect()->route('home')
        ->with('success', 'Un code de vérification vous a été envoyé par email.')
        ->with('showVerifyModal', true);
}

public function verifyCode(Request $request)
{
    $request->validate([
        'code' => ['required','digits:6'],
    ]);

    $reg = session('registration_data');
    if (!$reg || empty($reg['email'])) {
        return redirect()->route('home')->with('error', 'Session expirée. Veuillez recommencer l’inscription.');
    }

    $email = $reg['email'];
    $expected = Cache::get('verify_code_'.$email);

    if ((string)$request->code !== (string)$expected) {
        $attempts = (int) session('verify_attempts', 0) + 1;
        session(['verify_attempts' => $attempts]);

        if ($attempts >= 5) {
            // Trop d’essais : on purge et on force à recommencer
            Cache::forget('verify_code_'.$email);
            session()->forget(['registration_data', 'verify_attempts', 'last_resend_at']);
            return redirect()->route('home')->with('error', 'Trop d’essais. Veuillez recommencer l’inscription.');
        }

        return back()->with('error', 'Code incorrect.')->with('showVerifyModal', true);
    }

    // ✅ Code OK : on crée définitivement l’utilisateur
    $user = User::create([
        'pseudo'            => $reg['pseudo'],
        'email'             => $email,
        'password'          => Hash::make($reg['password']),
        'email_verified_at' => now(),
    ]);

    // Envoi de l’email de bienvenue (déjà présent dans ton projet)
    Mail::to($user->email)->send(new WelcomeMail($user)); // :contentReference[oaicite:9]{index=9}

    Auth::login($user);

    // Nettoyage
    Cache::forget('verify_code_'.$email);
    session()->forget(['registration_data', 'verify_attempts', 'last_resend_at']);

    return redirect('/dashboard')->with('success', 'Compte vérifié avec succès !');
}
public function resendCode(Request $request)
{
    $reg = session('registration_data');
    if (!$reg || empty($reg['email'])) {
        return redirect()->route('home')->with('error', 'Session expirée. Veuillez recommencer l’inscription.');
    }

    $email = $reg['email'];

    // Anti-spam: 60s mini entre 2 envois
    $last = session('last_resend_at');
    if ($last && now()->diffInSeconds($last) < 60) {
        $wait = 60 - now()->diffInSeconds($last);
        return back()->with('error', "Veuillez patienter encore $wait secondes avant un nouvel envoi.")
                     ->with('showVerifyModal', true);
    }

    $code = random_int(100000, 999999);
    Cache::put('verify_code_'.$email, $code, now()->addMinutes(10));
    session(['last_resend_at' => now()]);

    Mail::to($email)->send(new VerificationCodeMail($code));

return back()->with('success', 'Nouveau code envoyé.')->with('showVerifyModal', true);
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
    $achats = [];

    if (Auth::check()) {
        $achats = \App\Models\Achat::where('user_id', Auth::id())
            ->pluck('modele_id')
            ->toArray();
    }

    return view('dashboard', compact('modeles', 'achats'));
}
    public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nom' => 'nullable|string|max:255',
        'prenoms' => 'nullable|string|max:255',
        'age' => 'nullable|integer',
        'pseudo' => 'required|string|max:255',
        'departement' => 'nullable|string|max:255',
        'numero_whatsapp' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($request->only(['nom', 'prenoms', 'age', 'pseudo', 'departement', 'email','numero_whatsapp']));

    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}

}
