<?php
// app/Http/Controllers/ModeleAuth/ResetPasswordController.php
// app/Http/Controllers/ModeleAuth/ResetPasswordController.php
namespace App\Http\Controllers\ModeleAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Modele;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('modele.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('modeles')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Modele $modele, $password) {
                $modele->password = Hash::make($password);
                $modele->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            // Redirection vers la page de login modèle
            return redirect()
                ->route('modele.login') // Assure-toi que la route existe
                ->with('success', 'Votre mot de passe a été réinitialisé. Veuillez vous reconnecter.');
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
