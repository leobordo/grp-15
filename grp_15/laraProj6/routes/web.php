<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AziendeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Utente3Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['livello:2'])->group(function (){

        Route::get('/listaPromozioni/aggiungiPromozione', [Utente3Controller::class, 'showFormPromozione'])
        ->name('aggiungipromozione');
        Route::get('/listaPromozioni', [Utente3Controller::class, 'showPromozioni'])
        ->name('showPromozione');
        Route::get('/listaPromozioni/{chiave}', [Utente3Controller::class, 'getPromozione'])
        ->name('promozione');
        Route::get('/listaPromozioni/{chiave}/delete', [Utente3Controller::class, 'deletePromozione'])
        ->name('deletepromo');
        Route::get('/listaPromozioni/{chiave}/modificaPromozione', [Utente3Controller::class, 'modificaPromozione'])
        ->name('modificapromo');
        Route::post('/listaPromozioni/{chiave}/modificaPromozione/salva', [Utente3Controller::class, 'salvamodifichePromo'])
        ->name('salvamodifichePromo');
        Route::post('/listaPromozioni/aggiungiPromozione/redirecting',[Utente3Controller::class, 'aggiungiPromozione'])
        ->name('aggiungipromozione2');


});

Route::middleware(['livello:3'])->group(function (){

        Route::get('/listaOperatori', [Utente3Controller::class, 'showOperatori'])
        ->name('showOperatore');
        Route::get('/listaClienti', [Utente3Controller::class, 'showClienti'])
        ->name('showCliente');
        Route::get('/listaOperatori/cerca', [PublicController::class, 'showRisultatiOp'])
        ->name('showRisultatiOp');
        Route::get('/listaClienti/cerca', [PublicController::class, 'showRisultatiCl'])
        ->name('showRisultatiCl');
        Route::get('/listaOperatori/{chiave}', [Utente3Controller::class, 'getOperatore'])
        ->name('operatore');
        Route::get('/listaClienti/{chiave}', [Utente3Controller::class, 'getCliente'])
        ->name('cliente');
        Route::get('/listaOperatori/{chiave}/delete', [Utente3Controller::class, 'deleteOperatore'])
        ->name('deleteoperatore');
        Route::get('/listaClienti/{chiave}/delete', [Utente3Controller::class, 'deleteCliente'])
        ->name('deletecliente');
        Route::get('/listaOperatori/aggiungiOperatore',[Utente3Controller::class, 'showFormOperatore'])
        ->name('aggiungioperatore');
        Route::post('/listaOperatori/aggiungiOperatore/redirecting',[Utente3Controller::class, 'aggiungiOperatore'])
        ->name('aggiungioperatore2');
        Route::get('/listaOperatori/{chiave}/modificaOperatore',[Utente3Controller::class, 'modificaOperatore'])
        ->name('modificaoperatore');
        Route::post('/listaOperatori/{chiave}/modificaOperatore/salva',[Utente3Controller::class, 'salvaOperatore'])
        ->name('salvamodifiche');
        Route::resource('aziende',AziendeController::class)
        ->names([
                'index' => 'gestioneAziende',
                'show' => 'showAzienda',
                'create' => 'aggiungiAzienda',
                'edit' => 'modificaAzienda',
                'store' =>'aggiungiAzienda2',
                'update' => 'modificaAzienda2',
                'destroy' => 'eliminaAzienda'
        ]);
});

Route::get('/',[PublicController::class, 'showHome'])
->name('home'); /* rotta per la visualizzazione delle promozioni */

Route::get('/ChiSiamo',[PublicController::class, 'showWho'])
->name('who');

Route::get('/cerca', [PublicController::class, 'showRisultatiPromo'])
        ->name('showRisultatiPromo');        

Route::get('/faq', [PublicController::class, 'showFaq'])
        ->name('faq');

Route::get('/Promozioni/{chiave}', [Utente3Controller::class, 'getPromozione'])
        ->name('promozione_guest');
      

        /*ROTTE BREEZE
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


require __DIR__.'/auth.php';
