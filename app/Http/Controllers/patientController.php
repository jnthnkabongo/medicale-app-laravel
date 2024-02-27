<?php

namespace App\Http\Controllers;

use App\Http\Requests\rechercher_patient;
use App\Http\Requests\saveAgenda;
use App\Http\Requests\savePatients;
use App\Models\patients;
use App\Models\rendez;
use App\Models\rendez_vous;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\specialites;
use App\Models\User;

class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste_patient = patients::orderByDesc('id')->paginate(10);
        return view('users.pages.patients.index', compact('liste_patient'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //Formulaire de creation des patients
    public function create()
    {

        $code_patient = Str::random(7);
        return view('users.pages.patients.creation-patient', compact('code_patient'));
    }

    //Sounission du formulaire de creation des patients
    public function store(patients $Patients, savePatients $request)
    {

        try {
            $Patients->code_patient = $request->code_patient;
            $Patients->nom = $request->nom;
            $Patients->email = $request->email;
            $Patients->contact = $request->contact;
            $Patients->datenais = $request->datenais;
            $Patients->etat_consult = 0;
            $Patients->adresse = $request->adresse;
            $Patients->note = $request->note;
            $Patients->save();
            return back()->with('Message', 'La création du patient s\'effectuer avec succès...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */

     //Affichage du formulaire de modification des patients
    public function show(patients $patients)
    {
        //On prend la variable d'affichage de la liste au'on utilise pour recuperer l'occurence dont on a besoin [$patients]
        return view('users.pages.patients.modifier-patient', compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //Soumission du formulaire de modification du patient
    public function edit(Request $request, patients $patients)
    {
        try {
            $patients->nom = $request->nom;
            $patients->email = $request->email;
            $patients->contact = $request->contact;
            $patients->datenais = $request->datenais;
            $patients->adresse = $request->adresse;
            $patients->note = $request->note;
            $patients->update();
            return to_route('liste-patient')->with('Message', 'La modification s\'effectuer avec succès...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    /**
     * Update the specified resource in storage. php artisan serve --host 192.168.74.40
     */

    //La fonction de recherche d'un patient
    public function search(patients $Patients, rechercher_patient $request)
    {
        try {
            $rechercher_patients = $_GET['rechercher_patients'];
            $liste_patient = patients::where('nom','LIKE','%'.$rechercher_patients.'%')->paginate(10);
            return view('users.pages.patients.index', compact('liste_patient'));
        } catch (\Throwable $e) {
             dd($e);
        }
    }
    //Formulaire d'affichage de creation de rendez-vous
    public function agenda(patients $patients){
        $liste_specialites = specialites::all();
        $liste_docteurs = DB::table('users')->where('roles_id', '=', '2')->get();
        return view('users.pages.patients.creation-agenda', compact('patients','liste_specialites','liste_docteurs'));
    }

    public function creation_agenda(rendez $Rendez, saveAgenda $request){
        try {
            $Rendez->code_patient = $request->code_patient;
            $Rendez->patient_id = $request->patient_id;
            $Rendez->date_rdv = $request->date_rdv;
            $Rendez->spec_id = $request->spec_id;
            $Rendez->users_id = $request->users_id;
            $Rendez->status = 3;

            $Rendez->save();
            return back()->with('Message', 'La creation du rendez-vous a reussi avec succès...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    //Formulaire de visualisation du patient tout justement
    public function visualiser(){
        return view('users.pages.patients.infos-patient');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patients $patients)
    {
        try {
            $patients->delete();
            return back()->with('message', 'La suppression a reussi...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    ///------ La partie administrateur -------//

    // Formulaire de la liste des patients que verra l'administrateur
    public function index_admin_patient()
    {
        $admin_liste_patients = patients::paginate(10);
        return view('admin.pages-admin.patients.index-admin', compact('admin_liste_patients'));
    }

    // Formulaire de creation du patient par la'dministrateur
    public function creation_admin_patient()
    {
        return view('admin.pages-admin.patients.creation-admin-patient');
    }

    // Soumission du formulaire de creation du patient par l'administrateur
    public function soumission_creation_admin_patient()
    {

    }

    // Formulaire d'affichage du patient avant modification
    public function modification_admin_patient()
    {
        return view('admin.pages-admin.patients.modification-admin-patient');
    }

    // La methode de soumission du formulaire de modification du patient
    public function modifications_admin_patient()
    {

    }

    // La methode de suppression du patient par l'administrateur
    public function suppresion_admin_patient()
    {

    }
}
