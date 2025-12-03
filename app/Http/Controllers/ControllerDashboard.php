<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerDashboard extends Controller
{
    //
    function index(){
        // dd(Auth::user('role'));
        return view('viewDashboardClient');
    }
}
