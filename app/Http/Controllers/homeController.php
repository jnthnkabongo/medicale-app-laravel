<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\patients;
use App\Models\plaintes;
use App\Models\rendez;
use App\Models\User;
use Carbon\Carbon;
class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Si le role est 1 alors on dirige l'utilisateur a l'interface administrateur
        $roles = Auth::user()->roles_id;
        if ($roles == '1') {
            $compteurNombreTotalPatient = patients::all()->count(); //Compteur qui fait la somme de tous les patients
            $compteurDuJour = patients::whereDate('created_at', '=', Carbon::today())->count(); //Compteur qui sort que les pqtients qui ont été le jour ou l'on est...
            $compteurPatientconsulter = patients::where('etat_consult', 1)->count(); //Compteur total patients consultes
            $compteurTotalPersonnels = User::all()->count();
            $compteurTotalRendez = rendez::all()->count();
            $compteurPlaintes = plaintes::all()->count();
            $liste_de_tous_patients = patients::with('roles')->paginate(10);
            return view('admin.pages-admin.dashboard', compact('compteurNombreTotalPatient',
            'compteurDuJour','compteurPatientconsulter','compteurTotalPersonnels',
            'compteurTotalRendez','compteurPlaintes','liste_de_tous_patients'));

        }if ($roles == '2') {
            // Si le role est 2 alors on dirige l'utilisateur a l'interface du medecin

            $compteurNombreTotalPatient = patients::all()->count(); //Compteur qui fait la somme de tous les patients
            $compteurDuJour = patients::whereDate('created_at', '=', Carbon::today())->count(); //Compteur qui sort que les pqtients qui ont été le jour ou l'on est...
            $compteurPatientconsulter = patients::where('etat_consult', 1)->count(); //Compteur total patients consultes
            $liste_patient = patients::whereDate('created_at', '=', Carbon::today())->with('roles','plainte')->orderByDesc('id')->paginate(10); // La variable du tableau qui s'affiche sur la page et l'intitulé de la relation qu'il y a entre users et roles du fait qu'on affiche le role sur cette page alors il faut absolument le mettre
            return view('users.pages.index', compact('liste_patient','compteurNombreTotalPatient','compteurDuJour', 'compteurPatientconsulter'));

        }if ($roles == '3') {
            // Si le role est 3 alors on dirige l'utilisateur a l'interface du laborantin
            return view('labo.pages-labo.index-labo');
        }if ($roles == '4') {
            // Si le role est 4 alors on dirige l'utilisateur a l'interface de la receptionniste
            return view('medecin.pages-medecin.index-medecin');
        }
        if ($roles == '5') {
            // Si le role est 5 alors on dirige l'utilisateur a l'interface de l'infirmier
            return view('infirmier.pages-infir.index-infir');
        }else {
            return view('auth.page.login');
        }
    }

    public function errorpage()
    {
        return view('404');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
