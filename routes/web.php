<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ConctactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Etablissement;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\reservation;
use App\Http\Controllers\ReservationController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;



// route client
Route::get('/', [AccueilController::class, 'accueil']);

Route::get('/hotels', [HotelController::class, 'search_hotel']);
Route::get('/recherche', [RechercheController::class, 'rechercher'])->name('recherche.resultats');


// reservation hotel

Route::get('/reservation_hotel/{id}', [ReservationController::class, 'create'])->name('reservation_hotel');
Route::get('/reservations/{id}/accepter', [ReservationController::class, 'accepter'])->name('reservations_accepter');
Route::get('/reservations/{id}/refuser', [ReservationController::class, 'refuser'])->name('reservations_refuser');
Route::put('/reservations/{id}/update-statut', [ReservationController::class, 'updateStatut'])->name('reservations_update_statut');


Route::get('/reservation_admin', [ReservationController::class, 'reservation_admin']);
// reservation appart
Route::get('/reservation_etablissements/{id}', [ReservationController::class, 'create_appart'])->name('reservation_appart');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/hotels/{id}/reservations', [HotelController::class, 'reservations'])->name('hotels.reservations');


// routes de connexion
Route::get('/connexion', [Authcontroller::class, 'loginform']);
Route::post('/register', [Authcontroller::class, 'register']);
Route::post('/login', [Authcontroller::class, 'login']);
Route::get('/change_password', [Authcontroller::class, 'change_password'])->name('change_password');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change');

Route::get('/deconnexion', [Authcontroller::class, 'logout'])->name('logout');

// Routes gerants
Route::get('/home', [Authcontroller::class, 'home']);

// Route pour gerer le profil
Route::get('/profil', [Authcontroller::class, 'profil'])->name('admin.profil');
Route::get('/profil_edit', [Authcontroller::class, 'edit_profil']);
Route::post('/profil_save', [Authcontroller::class, 'update'])->name('profil_save');


// clients partie/admin
Route::get('/clients', [Authcontroller::class, 'clients_liste'])->name('admin.clients');


// Route pour gerer les finances
Route::get('/caisse', [FinanceController::class, 'index'])->name('admin.caisse');
Route::get('/rapport', [FinanceController::class, 'rapport_index'])->name('admin.rapport');
Route::get('/rapport/create', [FinanceController::class, 'create_rapport'])->name('admin.rapport.create');
Route::post('/rapport/store', [FinanceController::class, 'store_rapport'])->name('admin.rapport.store');
Route::delete('/admin/rapports/{id}', [FinanceController::class, 'destroy'])->name('admin.rapport.destroy');


// Route pour gerer les hotels
Route::get('/etablissement', [HotelController::class, 'index'])->name('admin.etablissements');
Route::get('/ajouter_eta', [HotelController::class, 'Ajouter_hotel']);
Route::post('/create_hotel', [HotelController::class, 'create'])->name('create_hotel');
Route::delete('/hotels_delete/{id}', [HotelController::class, 'destroy'])->name('etablissements.destroy');
Route::get('/show_hotel/{id}', [HotelController::class, 'show'])->name('etablissements.show');

Route::get('/details/{id}', [HotelController::class, 'details'])->name('hotel.show');
Route::delete('/supp_hotel/{id}', [HotelController::class, 'destroy'])->name('supp_hotel');

Route::get('/modif_form/{id}', [HotelController::class, 'edit']);
Route::post('/modif_save/{id}', [HotelController::class, 'update'])->name('modif_save');

// Route pour les appartements
Route::get('/ajouter_appart', [AppartementController::class, 'Ajouter_appart']);
Route::post('/create', [AppartementController::class, 'create'])->name('create_appart');
Route::get('/show_appart/{id}', [AppartementController::class, 'show'])->name('show_appart');
Route::get('/details_appart/{id}', [AppartementController::class, 'details'])->name('appart.show');
Route::get('/modif_edit/{id}', [AppartementController::class, 'edit']);
Route::post('/modif_appart/{id}', [AppartementController::class, 'update'])->name('modif_appart');
Route::delete('/supp_appart/{id}', [AppartementController::class, 'destroy'])->name('supp_appart');

// Route pour chambre
Route::get('/chambres/{id}', [ChambreController::class, 'create'])->name('chambres.create');
Route::post('/etablissements/{id}/chambres', [ChambreController::class, 'store'])->name('chambres.store');
Route::get('/chambres/{id}/edit',    [ChambreController::class, 'edit'])->name('chambres.edit');
Route::put('/chambres/{id}',         [ChambreController::class, 'update'])->name('chambres.update');
Route::delete('/chambres/{id}',      [ChambreController::class, 'destroy'])->name('chambres.destroy');

// Route pour gerer les reservations
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');

// Route pour gerer les blogs
Route::get('/blog', [blogcontroller::class, 'index'])->name('admin.blog');
Route::get('/ajouter_blog', [blogcontroller::class, 'ajout_form']);
Route::post('/ajout_save', [blogcontroller::class, 'store']);


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'admin_view'])->name('superadmin.dashboard');
    Route::get('/inscription', [Authcontroller::class, 'registerform']);
    Route::get('/admin/users', [AdminController::class, 'liste_users'])->name('superadmin.users');
    Route::get('/admin/hotels', [AdminController::class, 'liste_hotels'])->name('superadmin.hotels');
    Route::get('/admin/appartements', [AdminController::class, 'liste_appartements'])->name('superadmin.appartements');
    Route::get('/admin/reservations', [AdminController::class, 'liste_reservations'])->name('superadmin.reservations');
    Route::get('/admin/details_hotel/{id}', [AdminController::class, 'show'])->name('superadmin.details');
        Route::get('/admin/details_appart/{id}', [AdminController::class, 'show_appart'])->name('superadmin.details.appart');



    Route::get('/profil/admin', [Authcontroller::class, 'profil_admin'])->name('superadmin.profil');
    Route::get('/profil_edit/admin', [Authcontroller::class, 'edit_profil_admin'])->name('superadmin.profil_edit');
    Route::post('/profil_save/admin', [Authcontroller::class, 'update_admin'])->name('superadmin.profil_save');
});

Route::post('/contact', [ConctactController::class, 'send'])->name('contact.send');