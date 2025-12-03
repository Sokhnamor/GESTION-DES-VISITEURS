<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ControllerAjoutClient extends Controller
{
    //
    function index(){
        $clients=client::all();
        return view('viewAjoutClient',['clients'=>$clients]);
    }
    function ajouterClient(Request $request){
        $request->validate([
            'nom'=>'required|string|max:255',
            'prenom'=>'required|string|max:255',
            'telephone'=>'required|string|max:20',
            'email'=>'required|email|unique:clients,email',
            'entreprise'=>'nullable|string|max:255'
        ],[
            'nom.required'=>'Le nom est obligatoire.',
            'prenom.required'=>'Le prénom est obligatoire.',
            'telephone.required'=>'Le téléphone est obligatoire.',
            'email.required'=>'L\'email est obligatoire.',
            'email.email'=>'Le format de l\'email est invalide.',
            'email.unique'=>'Cet email est déjà utilisé.'
        ]);
        $client=new client();
            $client->nom=$request->input('nom');
            $client->prenom=$request->input('prenom');
            $client->telephone=$request->input('telephone');
            $client->email=$request->input('email');
            $client->entreprise=$request->input('entreprise');
            $client->save();
        return redirect()->route('gestionclient');
    }
}
