<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AziendeController;
use App\Http\Controllers\Utente3Controller;
use App\Http\Controllers\Utente1Controller;

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
Route::middleware(['livello:1,'])->group(function (){
        Route::get('/iMieiCoupon',[Utente1Controller::class, 'iMieiCoupon'])
        ->name('iMieiCoupon');
        Route::get('/coupon/{chiave}/show', [Utente1Controller::class, 'showCoupon'])
        ->name('coupon');
        Route::get('/coupon/{chiave}', [Utente1Controller::class, 'getCoupon'])
        ->name('getCoupon');
});
Route::middleware(['livello:1,2'])->group(function (){
        Route::get('/ilMioProfilo/{chiave}', [Utente1Controller::class, 'getProfilo'])
        ->name('profilo');
        Route::get('/ilMioProfilo/{chiave}/modificaProfilo',[Utente1Controller::class, 'modificaProfilo'])
        ->name('modificaprofilo');
        Route::post('/ilMioProfilo/{chiave}/modificaProfilo/salva',[Utente1Controller::class, 'salvaProfilo'])
        ->name('salvaProfilo');
        
        
});
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
        Route::get('/statistiche', [Utente3Controller::class, 'showStats'])//statistiche
        ->name('showStatistica');
        Route::get('/listaClienti', [Utente3Controller::class, 'showClienti'])
        ->name('showCliente');
        Route::post('/listaOperatori/cerca', [PublicController::class, 'showRisultatiOp'])
        ->name('showRisultatiOp');
        Route::post('/listaClienti/cerca', [PublicController::class, 'showRisultatiCl'])
        ->name('showRisultatiCl');
        Route::post('/aziende/cerca', [PublicController::class, 'showRisultatiAz'])
        ->name('showRisultatiAz');
        Route::get('/listaOperatori/{chiave}', [Utente3Controller::class, 'getOperatore'])
        ->name('operatore');
        Route::get('/listaClienti/{chiave}', [Utente3Controller::class, 'getCliente'])
        ->name('cliente');
        Route::get('/listaOperatori/{chiave}/delete', [Utente3Controller::class, 'deleteOperatore'])
        ->name('deleteoperatore');
        Route::get('/listaClienti/{chiave}/delete', [Utente3Controller::class, 'deleteCliente'])
        ->name('deletecliente');
        Route::get('/aggiungiOperatore',[Utente3Controller::class, 'showFormOperatore'])
        ->name('aggiungioperatore');
        Route::post('aggiungiOperatore/redirecting',[Utente3Controller::class, 'aggiungiOperatore'])
        ->name('aggiungioperatore2');
        Route::get('/listaOperatori/{chiave}/modificaOperatore',[Utente3Controller::class, 'modificaOperatore'])
        ->name('modificaoperatore');
        Route::post('/listaOperatori/{chiave}/modificaOperatore/salva',[Utente3Controller::class, 'salvaOperatore'])
        ->name('salvamodifiche');
        //faq
        Route::post('/faq/aggiungi', [Utente3Controller::class, 'aggiungiFaq'])
        ->name('aggiungifaq');
        Route::get('/faq/modifica', [Utente3Controller::class, 'modificaFaq'])
        ->name('modificafaq');
        Route::get('/faq/{chiave}/delete', [Utente3Controller::class, 'eliminaFaq'])
        ->name('eliminafaq');
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
Route::get('/assegnaAziende/{oper}',[Utente3Controller::class, 'assegnaAziende'])
        ->name('assegnaaziende');
Route::post('/assegnaAziende/{oper}/redirecting',[Utente3Controller::class, 'assegnaAziende2'])
        ->name('assegnaaziende2');
});

Route::get('/',[PublicController::class, 'showHome'])
->name('home'); /* rotta per la visualizzazione delle promozioni */

Route::get('/ChiSiamo',[PublicController::class, 'showWho'])
->name('who');
Route::get('/promoPublic/{chiave}',[PublicController::class, 'getPromozionePublic'])
        ->name('promozione2');

Route::post('/cerca', [PublicController::class, 'showRisultatiPromo'])
        ->name('showRisultatiPromo');        

Route::get('/faq', [PublicController::class, 'showFaq'])
        ->name('faq');

Route::get('/Promozioni/{chiave}', [Utente3Controller::class, 'getPromozione'])
        ->name('promozione_guest');

Route::get('/aziendaPublic/{chiave}', [PublicController::class, 'getAziendaPublic'])
        ->name('azienda2');  

        /*ROTTE BREEZE
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


require __DIR__.'/auth.php';
