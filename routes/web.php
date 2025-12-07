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
Route::get('/inscrire',function(){
    return view('');
})->name('inscrir');

Route::get('/passwordforget',function(){
    return view('viewPasswordForget');
})->name('passwordforget');

use App\Http\Controllers\VisiteController;


// Route::get('/', function () {
//     // Quand tu vas sur http://127.0.0.1:8000
//     // tu es redirigé vers la page d’enregistrement des visites
//     // return redirect()->route('visites.create');
// });

// Formulaire d’enregistrement
Route::get('/visites/create', [VisiteController::class, 'create'])->name('visites.create');

// Traitement du formulaire
Route::post('/visites', [VisiteController::class, 'store'])->name('visites.store');

// Historique
Route::get('/visites', [VisiteController::class, 'index'])->name('visites.index');

// Enregistrer le départ d’une visite
Route::post('/visites/{id}/depart', [VisiteController::class, 'enregistrerDepart'])
    ->name('visites.depart');


