<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/connexion',[Authcontroller::class, 'loginform']);
Route::get('/inscription',[Authcontroller::class, 'registerform']);

Route::post('/register', [Authcontroller::class, 'register']);
Route::post('/login', [Authcontroller::class, 'login']);

Route::get('/home', [Authcontroller::class, 'home']);
Route::get('/', function(){
    return view('accueil');
});



