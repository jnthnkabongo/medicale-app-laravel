<?php

namespace App\Http\Controllers;

use App\Http\Requests\savePatients;
use App\Models\patients;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $liste_patient = patients::all()->sortDesc();
        return view('users.pages.patients.index', compact('liste_patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $code_patient = Str::random(7);
        return view('users.pages.patients.create', compact('code_patient'));
    }

    //creation du patient sur livewire
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
