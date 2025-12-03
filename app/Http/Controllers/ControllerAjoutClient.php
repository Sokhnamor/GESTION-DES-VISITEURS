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
        return redirect()->route('gestionclient');
    }
}
