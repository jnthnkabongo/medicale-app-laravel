<?php

namespace App\Http\Controllers;

use App\Http\Requests\rechercherUtilisteur;
use App\Http\Requests\saveUtilisateu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\patients;
use App\Models\plaintes;
use App\Models\rendez;
use App\Models\User;
use App\Models\roles;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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
        $liste_de_tous_patients = patients::with('roles')->paginate(10);
        return view('admin.pages-admin.dashboard', compact('compteurNombreTotalPatient',
        'compteurDuJour','compteurPatientconsulter','compteurTotalPersonnels',
        'compteurTotalRendez','compteurPlaintes','liste_de_tous_patients'));
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

    ///------ La partie administrateur -------//

    public function admin_personel()
    {
        $admin_liste_personnel = User::with('roles')->paginate(10);
        return view('admin.pages-admin.personnels.index-admin-personnel', compact('admin_liste_personnel'));
    }

    // La partie de renvoi du formulaire de modification de la partie de l'administrateur
    public function admin_modification_personnel(User $admin_personnel)
    {
        $role_select =roles::all();
        return view('admin.pages-admin.personnels.modification-admin-personnel', compact('admin_personnel','role_select'));
    }

    // Soumission du formulaire de la partie de modification du personnel de l'hopital docteurs, infirmiers, etc....
    public function admin_modifications_personnel(Request $request, User $admin_personnel)
    {
        try {
            $admin_personnel->name = $request->name;
            $admin_personnel->email = $request->email;
            $admin_personnel->password = $request->password;
            $admin_personnel->roles_id = Hash::make($request->roles_id) ;
            //dd($admin_personnel);
            $admin_personnel->update();
            return to_route('admin_personels-index')->with('Messge', 'La modification s\'effectuer avec succès...');
        } catch (\Throwable $e) {
           dd($e);
        }
    }

    //La soummission de la methode de suppression du l'utilisateur
    public function admin_suppression_personnel(User $admin_personnel)
    {
        try {
            $admin_personnel->delete();
            return back()->with('message', 'La suppression de l\'utilisateur s\'effectuer avec succes');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //
    public function admin_recherche_personnel(User $admin_liste_personnel, rechercherUtilisteur $request)
    {
        try {
            $rechercher_utilisateur = $_GET['rechercher_utilisateur'];
            $admin_liste_personnel = User::where('name','LIKE','%'.$rechercher_utilisateur.'%')->paginate(10);
            return view('admin.pages-admin.personnels.index-admin-personnel', compact('admin_liste_personnel'));
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    public function admin_creation_personnels()
    {
        $liste_roles = roles::all();
        return view('admin.pages-admin.personnels.creation-admin-personnel', compact('liste_roles'));
    }
    public function admin_creation_personnel(User $Utilisateur, saveUtilisateu $request)
    {
        try {
            $Utilisateur->name = $request->name;
            $Utilisateur->email = $request->email;
            $Utilisateur->password = $request->password;
            $Utilisateur->roles_id = $request->roles_id;
            $Utilisateur->plainte_id = 0;
            $Utilisateur->save();
            return to_route('admin_personels-index')->with('message', 'Operation reussi avec succes...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }
}
