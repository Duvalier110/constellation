<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\ChambreController;
use App\http\Controllers\CategorieController;
use App\http\Controllers\ServiceController;
use App\Http\Controllers\AfficherChambreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VitrineController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [IndexController::class, 'Afficher_chambre']);
// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/dashboard', [DashboardController::class, 'afficher_dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
//  Route::get('/dashboard', function () {
//      return view('dashboard');
//  })->middleware(['auth', 'verified'])->name('dashboard');

 Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });
 require __DIR__.'/auth.php';

 Route::get('/admin', [AdminController::class, 'tableau_de_bord']);

 //gestion des chambres
Route::get('/deletechambre/{id}', [ChambreController::class, 'supp_chambre']);


Route::post('/statut/traitement', [ChambreController::class, 'update_statut_chambre']);
Route::get('/chambre', [ChambreController::class, 'tableau_chambre'])->middleware('permission:chambres-read');
Route::get('/formchambre', [ChambreController::class, 'publi_chambre'])->middleware('permission:chambres-create');
Route::post('/chambre/traitement', [ChambreController::class, 'ajouter_chambre_traitement']);

Route::get('/show_chambre/{id}', [ChambreController::class, 'show_chambre']);
Route::get('/updatechambre/{id}', [ChambreController::class, 'update_chambre']);
Route::post('/updatech/traitement', [ChambreController::class, 'modifier_chambre_traitement']);


//gestion des categories
 Route::get('/deletecategorie/{id}', [CategorieController::class, 'delete_categorie']);
 Route::get('/show_categorie/{id}', [CategorieController::class, 'show_categorie']);
 Route::get('/categorie', [CategorieController::class, 'tableau_categorie'])->middleware('permission:categorie-read');
 Route::post('/categorie/traitement', [CategorieController::class, 'ajouter_categorie']);
 Route::post('/update/traitement', [CategorieController::class, 'modifier_categorie_traitement']);


//gestion des services
Route::get('/delete-service/{id}', [ServiceController::class, 'delete_service']);
Route::get('/show_service/{id}', [ServiceController::class, 'show_service']);
Route::get('/service', [ServiceController::class, 'tableau_service'])->middleware('permission:service-read');
Route::post('/service/traitement', [ServiceController::class, 'ajouter_service']);
Route::post('/updateServ/traitement', [ServiceController::class, 'modifi_servi_traitement']);


//afficher chambre
Route::get('/room', [AfficherChambreController::class, 'room_controller']);


//reservation
Route::get('/reservation/{id}', [ReservationController::class, 'afficher_reservation']);
Route::get('/show_demande/{id}', [ReservationController::class, 'show_demande']);
Route::post('/reservation/traitement', [ReservationController::class, 'ajouter_reservation']);
Route::get('/carracteristique/{id}', [ReservationController::class, 'carracteristique_chambre']);
Route::get('/demande', [ReservationController::class, 'afficher_demande_reservation'])->middleware('permission:reservations-read');
Route::get('/valid-demande/{id}', [ReservationController::class, 'valid_demande']);
Route::post('/valider_reservation', [ReservationController::class, 'valider_reservation']);



//virtrine
Route::get('/services', [VitrineController::class, 'aff_serv']);
Route::get('/propos', [VitrineController::class, 'aff_propos']);
Route::get('/equipe', [VitrineController::class, 'aff_equipe']);
Route::get('/temoignage', [VitrineController::class, 'aff_temoignage']);
Route::get('/historique', [VitrineController::class, 'aff_historique']);
Route::get('/complet', [VitrineController::class, 'aff_complet']);
Route::get('/caracteristique_demande/{id}', [VitrineController::class, 'carracteristique_demande']);
Route::post('/update/demande/traitement', [VitrineController::class, 'update_demande_reserv']);

//contact
Route::get('/contact/{id}', [ContactController::class, 'aff_contact']);
