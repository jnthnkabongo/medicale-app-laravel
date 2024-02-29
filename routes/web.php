<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\laboController;
use App\Http\Controllers\medecinController;
use App\Http\Controllers\parametresController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\plainteController;
use App\Http\Controllers\rendez_vousController;
use App\Http\Middleware\medecinConnecter;
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
Route::get('profil', [authController::class, 'profil'])->name('profil'); //Formulaire de modification de l'utilisateur
Route::post('profil-soumission',[authController::class, 'store'])->name('soumission-formulaire-profil'); // Soumission du formulaire de modification du profil
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

// Les routes de la partie du laborantin
Route::middleware(['laborantin'])->group(function (){
    Route::get('laborantin-index', [laboController::class, 'index'])->name('laborantin-index');
});

// Les routes de la partie du medecin
Route::middleware('medecin')->group(function (){
    Route::get('medecin-index', [medecinController::class, 'index'])->name('index-medecin');

    // Les routes de la partie medecin concernant les consultations
    Route::get('index-consultation', [medecinController::class, 'index_consultation'])->name('index-consultation');
});

// Les routes des administrateurs
Route::middleware(['administrateur'])->group(function () {
    Route::get('dashboard', [dashController::class, 'index'])->name('administration');

    // Les routes de la partie administrateur concernant le patient
    Route::get('admins-patient-index', [patientController::class, 'index_admin_patient'])->name('admin-patient-index'); // Liste de tous les patients du coté adminitrateur
    Route::get('admins-patient-creations', [patientController::class, 'soumission_creation_admin_patient'])->name('admin-patient-creations'); //Affichage du formulaire de creation du patient
    Route::post('admins-patient-creation', [patientController::class, 'creation_admin_patient'])->name('admin-patient-creation'); // Soumission du formulaire de creation du patient
    Route::get('admins-patient-modification', [patientController::class, 'modification_admin_patient'])->name('admin-patient-modification'); // Formulaire affichant la page de modification du patient
    Route::get('admins-patient-modifications', [patientController::class, 'modifications_admin_patient'])->name('admin-patient-modifications'); //Formulaire de sousmission de modification
    Route::get('admins-patient-suppression', [patientController::class, 'suppresion_admin_patient'])->name('admin-patient-suppression'); //route de suppresion du patient par l'administrateur

    // Les routes de la parrie administrateur concernant le personnels
    Route::get('admins-personnesl-index', [])->name('');
    Route::get('admins-personnesl-creation')->name('');
    Route::post('admins-personnesl-creations')->name('');
    Route::get('admins-personnesl-modification')->name('');
    Route::get('admins-personnesl-modifications')->name('');
    Route::get('admins-personnesl-suppression')->name('');

    // Les routes de la parrie administrateur concernant le plaintes
    Route::get('admins-plainte-index',[plainteController::class, 'admin_plainte_index'])->name('admins-plainte-index');
    Route::get('admins-plainte-creation',[plainteController::class, 'admin_creation_plainte'])->name('');
    Route::post('admins-plainte-creations',[plainteController::class, ''])->name('');
    Route::get('admins-plainte-modification',[plainteController::class, 'admin_modification_plainte'])->name('');
    Route::get('admins-plainte-modifications',[plainteController::class, ''])->name('');
    Route::get('admins-plainte-suppression',[plainteController::class, ''])->name('');

    // Les routes de la partie administrateur concernant le rendez-vous
    Route::get('admins-rendez-vous-index', [rendez_vousController::class, 'admin_rendez_vous'])->name('admins-rendez-vous-index');
    Route::get('admins-rendez-vous-creation')->name('');
    Route::post('admins-rendez-vous-creations')->name('');
    Route::get('admins-rendez-vous-modification')->name('');
    Route::get('admins-rendez-vous-modifications')->name('');
    Route::get('admins-rendez-vous-suppression')->name('');

    // Les routes de la parrie administrateur concernant le parametres
    Route::get('admins-parametres-index', [parametresController::class, 'admin_parametres'])->name('admins-parametres-index');
    Route::get('admins-parametres-creation')->name('');
    Route::post('admins-parametres-creations')->name('');
    Route::get('admins-parametres-modification')->name('');
    Route::get('admins-parametres-modifications')->name('');
    Route::get('admins-parametres-suppression')->name('');

    // Les routes de la partie administrateur concernant les personnels

    Route::get('admins-personnels-index', [dashController::class, 'admin_personel'])->name('admin_personels-index');
    Route::get('admins-personnels-modification-{admin_personnel}', [dashController::class, 'admin_modification_personnel'])->name('admin_personnel-modification');
    Route::get('admin-personnel-modifications-{admin_personnel}', [dashController::class, 'admin_modifications_personnel'])->name('admin_personnel_modifications');
    Route::get('admin-personnel-suppression-{admin_personnel}', [dashController::class, 'admin_suppression_personnel'])->name('admin_personnel_suppression');
    Route::get('admins-personnel-recherche', [dashController::class, 'admin_recherche_personnel'])->name('admin_personnel_recherche');
    Route::post('admin-personnel-creation', [dashController::class, 'admin_creation_personnel'])->name('admin_personnel_creation');
    Route::get('admin-personnel-creations', [dashController::class, 'admin_creation_personnels'])->name('admin_personnel_creations');

});
//Page d'erreur retour automatique
Route::get('page-404', [homeController::class, 'errorpage'])->name('page-404');
