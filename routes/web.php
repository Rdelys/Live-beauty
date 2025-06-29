<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeleController;

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
