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
        return view('viewConnexion');
    }
   function login(Request $request){
        $verify=Auth::attempt($request->only('email','password'));
        if($verify){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error','Email ou mot de passe incorrect');
        }
    }
}
