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
        return view('users.pages.patients.create', compact('code_patient'));
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
        return view('users.pages.create_patient', compact('patients'));
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
     * Update the specified resource in storage.
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
        return view('users.pages.patients.agenda', compact('patients','liste_specialites','liste_docteurs'));
    }

    public function creation_agenda(rendez $Rendez, saveAgenda $request){
        try {
            $Rendez->code_patient = $request->code_patient;
            $Rendez->patient_id = $request->patient_id;
            $Rendez->date_rdv = $request->date_rdv;
            $Rendez->spec_id = $request->spec_id;
            $Rendez->users_id = $request->users_id;
            $Rendez->status = 2;

            $Rendez->save();
            return back()->with('Message', 'La creation du rendez-vous a reussi avec succès...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    //Formulaire de visualisation du patient tout justement
    public function visualiser(){
        return view('users.pages.patients.visualiser');
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
}
