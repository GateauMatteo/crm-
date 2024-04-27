<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\ClientProspectsController;
use App\Http\Controllers\CommerciauxController;
use App\Http\Controllers\ResponsablesController;
use App\Http\Controllers\RequetesController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\VitrineController;

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

Route::get('/', function () {
    return view('vitrine'); // Affiche la vue 'vitrine' à la racine de l'URL
});

Route::resource('achat', AchatController::class);
Route::resource('produits', ProduitsController::class);
Route::resource('ClientProspect', ClientProspectsController::class);
Route::resource('Commerciaux', CommerciauxController::class);
Route::resource('Responsable', ResponsablesController::class);
Route::resource('Requete', RequetesController::class);
Route::resource('AchatRecapitulatif', AchatsController::class);
Route::resource('Rdv',RendezvousController::class);



// Route spécifique pour l'affichage du récapitulatif des achats pour un client donné (vous pouvez l'ajuster selon vos besoins)
Route::get('/recapitulatif/{clientId}', [AchatController::class, 'recapitulatifAchats'])->name('achat.recapitulatif');

// Routes supplémentaires si vous en avez besoin
Route::get('/achat/create', [AchatController::class, 'create'])->name('achat.create');
Route::get('/achat/show', [AchatController::class, 'show'])->name('achat.show');
Route::post('/achat', [AchatController::class, 'store'])->name('achat.store');
Route::put('/achat/{achat}', [AchatController::class, 'update'])->name('achat.update');
Route::delete('/achat/{achat}', [AchatController::class, 'destroy'])->name('achat.destroy');
Route::get('/achat/edit',[AchatController::class, 'edit'])->name('achat.edit');







// Route pour la méthode index de ProduitsController
Route::get('/produits', [ProduitsController::class, 'index'])->name('produits.index');
Route::post('/produits',[ProduitsController::class,'store'])->name('produits.store');
Route::get('/produits/create',[ProduitsController::class, 'create'])->name('produits.create');
Route::get('/produits/show',[ProduitsController::class,'show'])->name('produits.show');
Route::delete('/produits/{produit}',[ProduitsController::class'destroy'])->name('produits.destroy');
Route::get('/produits/edit',[ProduitsController::class,'edit'])->name('produtis.edit');

Route::get('/Rendezvous',[RendezvousController::class,'index'])->name('Rendezvous.index');
Route::get('/Rendezvous/create',[RendezvousController::class,'create'])->name('Rendezvous.create');
Route::get('/Rendezvous/show',[RendezvousController::class,'show'])->name('Rendezvous.show');
Route::post('/Rendezvous',[RendezvousController::class,'store'])->name('Rendezvous.store');
Route::delete('/Rendezvous',[RendezvousController::class,'destroy'])->name('Rendezvous.destroy');
Route::get('/Rendezvous/edit', [RendezvousController::class, 'edit'])->name('rendezvous.edit');




Route::post('/rendezvous', [RendezvousController::class, 'store'])->name('rendezvous.store');
Route::get('/Rdv/{Rdv}', [RendezvousController::class, 'show'])->name('Rdv.show');


Route::delete('/produits/{produit}', [ProduitsController::class, 'destroy'])->name('produits.destroy');

// Route pour le récapitulatif des achats
Route::get('/recapitulatif/{clientId}', [AchatsController::class, 'recapitulatifAchats']);

// Route pour envoyer les rdv 
Route::post('/envoyer-rendezvous', [VitrineController::class, 'envoyerRendezvous'])->name('envoyer.rendezvous');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

