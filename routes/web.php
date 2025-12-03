<?php

use App\Http\Controllers\ControllerAjoutClient;
use App\Http\Controllers\ControllerConnexion;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerGestionClient;
use App\Http\Controllers\ControllerModifClient;
use Illuminate\Support\Facades\Route;

Route::get('/',[ControllerConnexion::class,'index'])->name('connexion');
Route::post('/login',[ControllerConnexion::class,'login'])->name('connexionPost');
Route::get('/dashboard',[ControllerDashboard::class,'index'])->name('dashboard');
Route::get('/gestionclient',[ControllerGestionClient::class,'index'])->name('gestionclient');
Route::get('/ajoutclient',[ControllerAjoutClient::class,'index'])->name('ajoutClient');
Route::post('/ajoutclientpost',[ControllerAjoutClient::class,'ajouterclient'])->name('ajoutClientPost');
Route::get('/modificationclient',[ControllerModifClient::class,'index'])->name('modifClient');
Route::post('/modificationclientpost',[ControllerModifClient::class,'modifierClient'])->name('modifClientPost');
Route::get('/inscrire',function(){ return view('');})->name('inscrir');
Route::get('/passwordforget',function(){ return view('viewPasswordForget');})->name('passwordforget');
