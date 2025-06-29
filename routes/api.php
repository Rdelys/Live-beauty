<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Models\Live;
use App\Models\Modele;
use Illuminate\Support\Facades\Cache;

Route::get('/live/active', function () {
    // Tu peux ajouter un cache de 15 secondes pour alléger
    return Cache::remember('active_lives', 15, function () {
        return Live::where('is_active', true)
            ->with('modele:id,prenom') // s’assurer que le prénom est dispo
            ->get()
            ->map(function ($live) {
                return [
                    'id' => $live->modele->id,
                    'prenom' => $live->modele->prenom,
                ];
            });
    });
});

