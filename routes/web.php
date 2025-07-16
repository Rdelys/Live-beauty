<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\JetonController;
use App\Http\Controllers\ModeleAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/admin/modeles', [ModeleController::class, 'store'])->name('modeles.store');

Route::get('/admin', [ModeleController::class, 'index'])->name('admin');
Route::get('/admin/modeles', [ModeleController::class, 'index'])->name('modeles.index');
// Modifier
Route::get('/admin/modeles/{id}/edit', [ModeleController::class, 'edit'])->name('modeles.edit');
Route::put('/admin/modeles/{id}', [ModeleController::class, 'update'])->name('modeles.update');

// Supprimer
Route::delete('/admin/modeles/{id}', [ModeleController::class, 'destroy'])->name('modeles.destroy');

Route::post('/jetons/store', [JetonController::class, 'store'])->name('jetons.store');


Route::get('/modele/login', [ModeleAuthController::class, 'showLoginForm'])->name('modele.login');
Route::post('/modele/login', [ModeleAuthController::class, 'login'])->name('modele.login.submit');
Route::post('/modele/logout', [ModeleAuthController::class, 'logout'])->name('modele.logout');

Route::middleware('auth.modele')->group(function () {
    Route::get('/modele/profil', [ModeleAuthController::class, 'profile'])->name('modele.profil');
});

// routes/web.php
use App\Http\Controllers\LiveController;

Route::get('/live/{id}', [LiveController::class, 'showLive']);

// Pour les utilisateurs connectés via middleware auth (modele ou user)
Route::middleware('auth:modele')->group(function () {
    Route::post('/api/live/start', [LiveController::class, 'startLive']);
    Route::post('/api/live/stop', [LiveController::class, 'stopLive']);
});
Route::middleware(['block.countries'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});

// API publique pour tous
Route::get('/api/live/active', [LiveController::class, 'activeLives']);
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
