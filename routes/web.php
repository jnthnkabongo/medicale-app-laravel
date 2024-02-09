<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\patientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [authController::class, 'index'])->name('page-accueil'); //Page d'accueil
Route::post('/', [authController::class, 'login'])->name('soumission');  //Soumission du formulaire
Route::get('gestion-app', [homeController::class, 'index'])->name('redirect');  //Route de gestion des utilisateur
Route::get('logout', [authController::class, 'destroy'])->name('logout'); //Deconnexion de l'app

// Les routes des utilisateurs
Route::middleware(['connexion'])->group(function () {
    Route::get('index', [indexController::class, 'index'])->name('index');
    Route::prefix('patient')->group(function(){
        Route::get('/', [patientController::class, 'index'])->name('liste-patient');
        Route::get('index', [patientController::class, 'create'])->name('formulaire-creation-patient');
        Route::post('creationpatient', [patientController::class, 'store'])->name('creationpatient');
        Route::get('edit/{patients}', [patientController::class, 'show'])->name('modifier-patient');
        Route::get('edits/{patients}', [patientController::class, 'edit'])->name('modifier-patients');
    });
});

// Les routes des administrateurs
Route::middleware(['administrateur'])->group(function () {
    Route::get('dashboard', [dashController::class, 'index'])->name('administration');
});
//Page d'erreur retour automatique
Route::get('page-404', [homeController::class, 'errorpage'])->name('page-404');
