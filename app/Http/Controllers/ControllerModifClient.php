<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ControllerModifClient extends Controller
{
    //
    function index(Request $request){
        $clients=client::orderBy('id','desc')->get();
        $id=$request->has('id')?$request->input('id'):null;
        $selectedClient=client::find($id);
        return view('viewModif',['clients'=>$clients,'selectedClient'=>$selectedClient]);
    }

    function modifierClient(Request $request){
        $client=client::find($request->input('id'));
        if($client){
            $client->nom=$request->input('nom');
            $client->prenom=$request->input('prenom');
            $client->telephone=$request->input('telephone');
            $client->email=$request->input('email');
            $client->entreprise=$request->input('entreprise');
            $client->save();
        }
        return redirect()->route('gestionclient');

    }
}
