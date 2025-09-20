<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Etablissement;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\reservation;
use App\Http\Controllers\ReservationController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;



 // route client
Route::get('/', [AccueilController::class, 'accueil'] );

Route::get('/hotels',[HotelController::class, 'search_hotel']);


Route::get('/reservation_etablissements', [ReservationController::class, 'create']);




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


// Route pour gerer les hotels
Route::get('/etablissement', [HotelController::class, 'index']);
Route::get('/ajouter_eta', [HotelController::class, 'Ajouter_hotel']);
Route::post('/create_hotel', [HotelController::class, 'create']);
Route::delete('/hotels_delete/{id}', [HotelController::class, 'destroy'])->name('etablissements.destroy');
Route::get('/show_hotel/{id}', [HotelController::class, 'show'])->name('etablissements.show');

Route::get('/details/{id}', [HotelController::class, 'show'])->name('hotel.show');




Route::get('/modif_form/{id}', [HomeController::class, 'edit']);
Route::post('/modif_save/{id}', [HomeController::class, 'update']);


// Route pour les appartements
Route::get('/ajouter_appart', [AppartementController::class, 'Ajouter_appart']);
Route::post('/create', [AppartementController::class, 'create']);
Route::get('/show_appart/{id}', [AppartementController::class, 'show']);







// Route pour chambre
Route::get('/chambres/{id}', [ChambreController::class, 'create'])->name('chambres.create');
Route::post('/etablissements/{id}/chambres', [ChambreController::class, 'store'])->name('chambres.store');



// Route pour gerer les reservations
Route::get('/reservation', [ReservationController::class, 'index']);



// Route pour gerer les blogs
Route::get('/blog', [blogcontroller::class, 'index']);
Route::get('/ajouter_blog', [blogcontroller::class, 'ajout_form']);
Route::post('/ajout_save', [blogcontroller::class, 'store']);
