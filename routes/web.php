<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\JetonController;
use App\Http\Controllers\ModeleAuthController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModeleAuth\ForgotPasswordController as ModeleForgotPasswordController;
use App\Http\Controllers\ModeleAuth\ResetPasswordController as ModeleResetPasswordController;

use App\Models\Modele;

Route::get('/forbidden', function () {
    return response()->view('errors.403', [], 403);
})->name('forbidden');

Route::get('/', function () {
    return view('home');
});

// Admin routes
Route::get('/admin', [ModeleController::class, 'index'])->name('admin');
Route::get('/admin/modeles', [ModeleController::class, 'index'])->name('modeles.index');
Route::post('/admin/modeles', [ModeleController::class, 'store'])->name('modeles.store');
Route::get('/admin/modeles/{id}/edit', [ModeleController::class, 'edit'])->name('modeles.edit');
Route::put('/admin/modeles/{id}', [ModeleController::class, 'update'])->name('modeles.update');
Route::delete('/admin/modeles/{id}', [ModeleController::class, 'destroy'])->name('modeles.destroy');

// Jetons
Route::post('/jetons/store', [JetonController::class, 'store'])->name('jetons.store');

// Auth pour modèle
Route::get('/modele/login', [ModeleAuthController::class, 'showLoginForm'])->name('modele.login');
Route::post('/modele/login', [ModeleAuthController::class, 'login'])->name('modele.login.submit');
Route::post('/modele/logout', [ModeleAuthController::class, 'logout'])->name('modele.logout');

Route::middleware('auth.modele')->group(function () {
    Route::get('/modele/profil', [ModeleAuthController::class, 'profile'])->name('modele.profil');
});

// Routes LiveController
Route::get('/live/{id}', [LiveController::class, 'show'])->name('live.show'); // ✅ Ne pas redéfinir
Route::get('/live/active', [LiveController::class, 'active']);
Route::post('/live/start', [LiveController::class, 'start']);
Route::post('/live/stop', [LiveController::class, 'stop']);
Route::get('/api/live/private', [LiveController::class, 'activePrivate'])
    ->middleware('auth');

    Route::middleware('auth')->group(function () {
    Route::get('/live/{modeleId}/{showPriveId}', [LiveController::class, 'showPrivate'])
        ->name('live.private.show');
});
// API publique
Route::get('/api/live/active', [LiveController::class, 'active']);
Route::post('/api/live/start', [LiveController::class, 'start']);
Route::post('/api/live/stop', [LiveController::class, 'stop']);

// Auth user
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/register/verify', [AuthController::class, 'verifyCode'])->name('register.verify');
Route::post('/register/resend', [AuthController::class, 'resendCode'])->name('register.resend');

// Middleware blocage pays
Route::middleware(['block.countries'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});


Route::get('/', [ModeleController::class, 'accueil'])->name('home');

// ❌ SUPPRIMÉ : Ne jamais redéfinir la route live ici !
// Route::get('/live/{id}', function (...) { ... });
Route::post('/acheter/jetons', [App\Http\Controllers\AchatJetonsController::class, 'ajouter']);


Route::view('/cgu', 'legal.cgu')->name('cgu');
Route::view('/politique-utilisation', 'legal.pu')->name('pu');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::get('/api/modele/{id}', function ($id) {
    $modele = Modele::findOrFail($id);
    return response()->json($modele);
});

use App\Http\Controllers\PhotoController;

Route::middleware(['auth.modele'])->group(function () {
    Route::post('/modele/photo-upload', [PhotoController::class, 'upload'])->name('modele.photo.upload');
    Route::delete('/modele/photo-delete/{index}', [PhotoController::class, 'delete'])->name('modele.photo.delete');
});
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Affichage du formulaire d'email
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Formulaire de réinitialisation
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Soumission du nouveau mot de passe
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Page Login factice
Route::get('/connexion', function () {
    return redirect('/'); // ou tu peux rediriger vers un layout avec les modales
})->name('login');

Route::get('/modele/{id}/', function ($id) {
    $modele = Modele::findOrFail($id);
    return view('modele.profile', compact('modele'));
})->name('modele.profile');

// Profil privé
Route::get('/modele/{id}/private', function ($id) {
    $modele = Modele::findOrFail($id);
    return view('modele.private', compact('modele'));
})->name('modele.private');

// Show privé (bouton d’action dans la page private.blade.php par exemple)
Route::get('/modele/{id}/private-show', function ($id) {
    $modele = Modele::findOrFail($id);
    return view('modele.private-show', compact('modele'));
})->name('modele.private.show');

use App\Http\Controllers\FavorisController;

Route::post('/favoris/{modele_id}', [FavorisController::class, 'toggle'])
    ->middleware('auth')
    ->name('favoris.toggle');

Route::post('/modele/{id}/videos/upload', [ModeleController::class, 'uploadVideos'])->name('modele.video.upload');

// routes/web.php
Route::post('/use-jeton', [\App\Http\Controllers\JetonController::class, 'useJeton'])
    ->middleware('auth')
    ->name('use.jeton');

    Route::post('/admin/clients/{id}/add-tokens', [App\Http\Controllers\Admin\ClientController::class, 'addTokens'])->name('admin.clients.addTokens');
Route::post('/admin/clients/{id}/remove-tokens', [App\Http\Controllers\Admin\ClientController::class, 'removeTokens'])->name('admin.clients.removeTokens');
Route::post('/admin/clients/{id}/toggle-ban', [App\Http\Controllers\Admin\ClientController::class, 'toggleBan'])->name('admin.clients.toggleBan');

// routes/web.php

Route::prefix('modele')->name('modele.')->group(function () {
    // Formulaire: demander le lien de réinitialisation
    Route::get('/password/request', [ModeleForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');

    // Envoi de l’email avec le lien
    Route::post('/password/email', [ModeleForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');

    // Formulaire: saisir le nouveau mot de passe
    Route::get('/password/reset/{token}', [ModeleResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');

    // Soumission du nouveau mot de passe
    Route::post('/password/reset', [ModeleResetPasswordController::class, 'reset'])
        ->name('password.update');
});
Route::post('/use-surprise', [JetonController::class, 'useSurprise'])->name('use.surprise');
Route::put('/modele/{id}/update', [App\Http\Controllers\ModeleController::class, 'update'])->name('modele.update');

// routes/web.php
use App\Http\Controllers\ShowPriveController;

Route::post('/show-prive/reserver', [ShowPriveController::class, 'reserver'])->name('show.prive.reserver');

use App\Http\Controllers\Admin\AnalyticsController;

Route::prefix('admin')->group(function () {
    Route::get('/api/model-connections', [AnalyticsController::class, 'modelConnections']);
    Route::get('/api/tokens-purchased', [AnalyticsController::class, 'tokensPurchased']);
    Route::get('/api/shows-per-day', [AnalyticsController::class, 'showsPerDay']);
});

