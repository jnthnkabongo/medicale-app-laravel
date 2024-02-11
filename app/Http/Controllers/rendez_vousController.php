<?php

namespace App\Http\Controllers;

use App\Models\rendez_vous;
use Illuminate\Http\Request;

class rendez_vousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste_rendezvous = rendez_vous::orderByDesc('id')->paginate('5');
        return view('users.pages.rendez-vous.index-rdv', compact('liste_rendezvous'));
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
        return view('users.pages.rendez-vous.creation-rdv');
    }

    /**
     * Display the specified resource.
     */
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
