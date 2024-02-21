<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\patients;
use App\Models\plaintes;
use App\Models\rendez;
use App\Models\User;
use Carbon\Carbon;
class dashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compteurNombreTotalPatient = patients::all()->count(); //Compteur qui fait la somme de tous les patients
        $compteurDuJour = patients::whereDate('created_at', '=', Carbon::today())->count(); //Compteur qui sort que les pqtients qui ont été le jour ou l'on est...
        $compteurPatientconsulter = patients::where('etat_consult', 1)->count(); //Compteur total patients consultes
        $compteurTotalPersonnels = User::all()->count();
        $compteurTotalRendez = rendez::all()->count();
        $compteurPlaintes = plaintes::all()->count();
        return view('admin.pages-admin.dashboard', compact('compteurNombreTotalPatient','compteurDuJour','compteurPatientconsulter','compteurTotalPersonnels','compteurTotalRendez','compteurPlaintes'));
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
    }
}
