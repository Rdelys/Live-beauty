<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\ModeleConnexion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\JetonPropose;

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
            
            // Marquer comme en ligne
            $modele->update(['en_ligne' => true]);
            
            // Enregistrer la connexion
            ModeleConnexion::create([
                'modele_id' => $modele->id,
                'date_connexion' => now(),
            ]);

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
                // Marquer comme hors ligne
                $modele->update(['en_ligne' => false]);
                
                // Enregistrer la déconnexion
                $connexion = ModeleConnexion::where('modele_id', $id)
                    ->whereNull('date_deconnexion')
                    ->latest()
                    ->first();
                
                if ($connexion) {
                    $connexion->update([
                        'date_deconnexion' => now(),
                        'duree_session_secondes' => $connexion->date_connexion->diffInSeconds(now())
                    ]);
                }
            }
        }

        Session::forget(['modele_logged_in', 'modele_id']);
        return redirect()->route('modele.login');
    }

    public function profile()
    {
        $modele = Modele::with(['jetons', 'connexions' => function($query) {
            $query->latest()->limit(10); // Dernières 10 connexions
        }])->findOrFail(session('modele_id'));
        
        $jetonsProposes = JetonPropose::all();

        return view('modele.profil', compact('modele', 'jetonsProposes'));
    }

    /**
     * Méthode pour les statistiques de connexion (optionnelle)
     */
    public function statistiquesConnexion()
    {
        $modeleId = session('modele_id');
        
        $stats = ModeleConnexion::where('modele_id', $modeleId)
            ->selectRaw('
                COUNT(*) as total_connexions,
                SUM(duree_session_secondes) as temps_total,
                AVG(duree_session_secondes) as temps_moyen,
                MAX(date_connexion) as derniere_connexion
            ')
            ->first();
        
        return $stats;
    }
}