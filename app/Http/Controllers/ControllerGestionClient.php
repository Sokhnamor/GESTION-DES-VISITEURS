<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ControllerGestionClient extends Controller
{
    //
    
   function index(Request $request){
    $clients=client::all();
    $id=$request->has('id')?$request->input('id'):null;
    $selectedClient=client::find($id);
    return view('viewGestionClient',['clients'=>$clients,'selectedClient'=>$selectedClient]);
   }
}
