<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patients;
class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compteurTotalPatientduJour = patients::where('');
        $liste_patient = patients::with('roles','plainte')->orderByDesc('id')->paginate(10);
        return view('users.pages.index', compact('liste_patient','compteurTotalPatientduJour'));
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
