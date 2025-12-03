<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDashboard extends Controller
{
    //
    function index(){
        return view('viewDashboardClient');
    }
}
