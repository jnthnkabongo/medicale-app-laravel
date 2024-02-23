<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class plainteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

     ///------ La partie administrateur -------//

     // Affichage de la liste des plaintes
     public function admin_plainte_index()
     {
        return view('admin.pages-admin.plaintes.index-admin-plainte');
     }

     // Affichage du formulaire de creation de la plainte
     public function admin_creation_plainte()
     {
        return view('admin.pages-admin.plaintes.creation-admin-plainte');
     }

     // La methode de soumission du formulaire de modification
     public function admin_soumission_creation_plainte()
     {

     }

     // Affichage du formulaire de modification de la plainte
     public function admin_modification_plainte()
     {
        return view('admin.pages-admin.plaintes.modification-admin-plainte');
     }

     // La methode de soumission du formulaire de modification de la plainte
     public function admin_modifications_plainte()
     {

     }

     // La methode de suppression de la plainte par l'administrateur
     public function admin_suppression_plainte()
     {

     }

}
