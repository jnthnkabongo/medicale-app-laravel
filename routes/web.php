<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\rendez_vousController;
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

    Route::get('/patients', [patientController::class, 'index'])->name('liste-patient'); //Prefixe de tous les routes patient
    Route::get('creation-patient', [patientController::class, 'create'])->name('formulaire-creation-patient'); // affichage de la page de tous les patients
    Route::post('patient-creation-soumission', [patientController::class, 'store'])->name('creationpatient');  //  soumission du formulaire de creation du patient
    Route::get('patient-modification-{patients}', [patientController::class, 'show'])->name('modifier-patient');  // affichage du formulaire de modification du patient
    Route::get('patient-soumission-edits-{patients}', [patientController::class, 'edit'])->name('modifier-patients');  // soumission du formulaire de modification du patient
    Route::get('suppresion/{patients}', [patientController::class, 'destroy'])->name('suppression-patient');  //suppression du patient
    Route::get('rechercher_patient', [patientController::class, 'search'])->name('rechercher-patient');  //Rechercher un patient
    Route::get('infos-patient-{patients}',[patientController::class, 'visualiser'])->name('visualiser-patient'); //Visauliser les informations du patient
    Route::get('patient-rendez-vous-patient-{patients}',[patientController::class, 'agenda'])->name('agenda-patient'); //Afficher le formulaire du patient
    Route::post('creer-agenda', [patientController::class, 'creation_agenda'])->name('creation_agenda'); //Soumission du formulaire de creation de rendez-vous

    //Les routes de la partie rendez-vous j'ai sorti ce dernier du group prefix sous
    //pretexte que les styles ne sont pas pris en charge...
    Route::get('rendez-vous', [rendez_vousController::class, 'index'])->name('liste-rendez-vous');
    Route::get('rendez-vous-create', [rendez_vousController::class, 'store'])->name('afficher-rendez-vous');
    Route::get('rendez-vous-edit', [rendez_vousController::class, 'show'])->name('afficher-modifier-rendez-vous');

    //Les routes de la partie parametres j'ai sorti ce dernier du group prefix sous
    //pretexte que les styles ne sont pas pris en charge...


});

// Les routes des administrateurs
Route::middleware(['administrateur'])->group(function () {
    Route::get('dashboard', [dashController::class, 'index'])->name('administration');
});
//Page d'erreur retour automatique
Route::get('page-404', [homeController::class, 'errorpage'])->name('page-404');
