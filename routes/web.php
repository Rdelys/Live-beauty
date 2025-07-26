<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\JetonController;
use App\Http\Controllers\ModeleAuthController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\AuthController;

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

// API publique
Route::get('/api/live/active', [LiveController::class, 'active']);
Route::post('/api/live/start', [LiveController::class, 'start']);
Route::post('/api/live/stop', [LiveController::class, 'stop']);

// Auth user
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

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
