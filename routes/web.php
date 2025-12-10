<?php

use App\Http\Controllers\ControllerAjoutClient;
use App\Http\Controllers\ControllerConnexion;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerGestionClient;
use App\Http\Controllers\ControllerModifClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteController;

Route::get('/',[ControllerConnexion::class,'index'])->name('connexion');
Route::post('/login',[ControllerConnexion::class,'login'])->name('connexionPost');
Route::get('/dashboard',[ControllerDashboard::class,'index'])->name('dashboard')->middleware('authentification');
Route::get('/gestionclient',[ControllerGestionClient::class,'index'])->name('gestionclient')->middleware('authentification');
Route::get('/ajoutclient',[ControllerAjoutClient::class,'index'])->name('ajoutClient')->middleware('authentification');
Route::post('/ajoutclientpost',[ControllerAjoutClient::class,'ajouterclient'])->name('ajoutClientPost')->middleware('authentification');
Route::get('/modificationclient',[ControllerModifClient::class,'index'])->name('modifClient')->middleware('authentification');
Route::post('/modificationclientpost',[ControllerModifClient::class,'modifierClient'])->name('modifClientPost')->middleware('authentification');
Route::get('/inscrire',function(){ return view('');})->name('inscrir')->middleware('authentification');
Route::get('/passwordforget',function(){ return view('viewPasswordForget');})->name('passwordforget')->middleware('authentification');
Route::get('/inscrire',function(){
    return view('');
})->name('inscrir');

Route::get('/passwordforget',function(){
    return view('viewPasswordForget');
})->name('passwordforget');






// Formulaire d’enregistrement
Route::get('/visites/create', [VisiteController::class, 'create'])->name('visites.create')->middleware('authentification');

// Traitement du formulaire
Route::post('/visites', [VisiteController::class, 'store'])->name('visites.store')->middleware('authentification');

// Historique
Route::get('/visites', [VisiteController::class, 'index'])->name('visites.index')->middleware('authentification');

// Enregistrer le départ d’une visite
Route::post('/visites/{id}/depart', [VisiteController::class, 'enregistrerDepart']) ->name('visites.depart')->middleware('authentification');

//Voir rappport
Route::get('/visites/rapport/{id}', [VisiteController::class, 'show'])->name('visites.show')->middleware('authentification');


//Exporter en PDF
Route::get('/visites/rapport/{id}', [VisiteController::class, 'show'])->name('visites.show');
Route::get('/visites/rapport/{id}/pdf', [VisiteController::class, 'exportPdf'])->name('visites.pdf');


Route::get('/visites', [VisiteController::class, 'index'])->name('visites.index')->middleware('authentification'); // Rapport
Route::get('/visites/parametres', [VisiteController::class, 'parametres'])->name('visites.parametres')->middleware('authentification');  // Paramètres





