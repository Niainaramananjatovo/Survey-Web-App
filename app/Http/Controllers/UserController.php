<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'genre' => ['required'],
            'email'=> ['required', 'email'],
            'departement' => ['required'],
            'matricule' => ['required'],
            'password' => ['required', 'min:8']
        ]); 

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'genre' => $request->genre,
            'email' => $request->email,
            'departement' => $request->departement,
            'matricule' => $request->matricule,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success'=> 'creation de votre compte avec succes']);
    } 

    public function connecter(Request $request){
        if(Auth::attempt([
            'matricule' => $request->matricule,
            'password' => $request->password, 
        ])) { 
            return response()->json(['success'=> Auth::user()->droit_rattache]);
        } else {
            return response()->json(['error'=> 'erreur de votre mot de passe ou de votre numéro Matricule']);
        }
    } 

    public function getUser($id){
        return User::where('id', $id)->get();
    }
}
