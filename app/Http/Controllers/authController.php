<?php

namespace App\Http\Controllers;

use App\Http\Requests\credentials;
use App\Models\personnels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*User::create([
            'name' => 'gloria',
            'email' => 'gloria@gmail.com',
            'password' => Hash::make('12345'),
            'roles_id' => '2'
        ]);*/
        return view('auth.page.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    //Soumission du formulaire
    public function login(credentials $request)
    {
        //Request nous permet de voir toutes les valeurs qui sort d'une requete
        //dd($request);
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('redirect'));
        }
        return to_route('redirect')->withErrors('L\'email saisie est introubable dans notre base de données')->onlyInput('email');
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
    public function destroy()
    {
        Auth::logout();
        return to_route('page-accueil')->with('message', 'Déconnecter avec succès...');
    }
}
