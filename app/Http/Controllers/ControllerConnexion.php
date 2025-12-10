<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerConnexion extends Controller
{
    //
    function index(){
        
        // User::create([
        //     'name'=>'Sokhna Mor',
        //     'email'=>'mor@gmail.com',
        //     'password'=>Hash::make('1234'),
        //     'role'=>'admin'
        // ]);
        //quand je suis sur la page de connexion je supprime le Auth:: user la session qui lui permet de connecter s'il existait
        Auth::logout();
        return view('viewConnexion');
    }
   function login(Request $request){
        $verify=Auth::attempt($request->only('email','password'));
        // dd(Auth::user()['role']);
        if($verify){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error','Email ou mot de passe incorrect');
        }
    }
}
