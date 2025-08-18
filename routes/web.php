<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Etablissement;
use App\Http\Controllers\reservation;
use Illuminate\Support\Facades\Route;



 // route client
Route::get('/', function(){
    return view('accueil');
});
Route::get('/hotels', function(){
    return view('hotels.liste');
});
Route::get('/details', function(){
    return view('hotels.details');
});




// routes de connexion
Route::get('/connexion',[Authcontroller::class, 'loginform']);
Route::get('/inscription',[Authcontroller::class, 'registerform']);
Route::post('/register', [Authcontroller::class, 'register']);
Route::post('/login', [Authcontroller::class, 'login']);


// Routes admins
Route::get('/home', [Authcontroller::class, 'home']);

// Route pour gerer le profil
Route::get('/profil', [Authcontroller::class, 'profil']);
Route::get('/profil_edit', [Authcontroller::class, 'edit_profil']);
Route::post('/profil_save', [Authcontroller::class, 'update'])->name('profil_save');


// Route pour gerer les etablissements
Route::get('/etablissement', [Etablissement::class, 'index']);
Route::get('/ajouter_eta', [Etablissement::class, 'Ajout_form']);


// Route pour gerer les reservations
Route::get('/reservation', [reservation::class, 'index']);


