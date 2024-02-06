<?php

namespace App\Livewire;

use App\Http\Requests\savePatients;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\patients;

class PatientForm extends Component
{
    public $code_patient;
    //creation du patient sur livewire
    public function store(patients $Patients, savePatients $request){
        try {
            $Patients->code_patient = $request->code_patient;
            $Patients->nom = $request->nom;
            $Patients->email = $request->email;
            $Patients->contact = $request->contact;
            $Patients->datenais = $request->datenais;
            $Patients->adresse = $request->adresse;
            $Patients->note = $request->note;
            $Patients->save();
            return back()->with('message', 'La création du patient s\'effectuer avec succès...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }
    // Le formulaire livewire qui genere le code patient automatiquement


}
