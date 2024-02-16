<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Models\rendez;
use App\Models\specialites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rendez_vousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste_rendezvous = rendez::orderByDesc('id')->paginate('5');
        return view('users.pages.rendez-vous.index-rdv', compact('liste_rendezvous'));
    }

    // La recherche des rendez-vous
    public function search (){

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $code_patient_afficher = patients::all();
        $liste_specialites = specialites::all();
        $liste_docteurs = DB::table('users')->where('roles_id', '=', '2')->get();
        return view('users.pages.rendez-vous.creation-rdv', compact('liste_specialites', 'liste_docteurs'));
    }

      //Sur le formulaire de creation du rendez-vous du patient
     //on recherche d'abord le code de ce dernier
     //public function view_code(){
        //$rechercher_code_patient = $_GET['code_patient'];
        //$code_patient_afficher = patients::where('code_patient','LIKE','%'.$rechercher_code_patient.'%');
        //return view('users.pages.rendez-vous.creation-rdv', compact('code_patient_afficher'));
     //}
    /**
     * Display the specified resource.
     */
    //Afficher le formulaire avant creation d'un nouveau rendez-vous
    public function show()
    {
        return view('users.pages.rendez-vous.afficher-rdv');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
