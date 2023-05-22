<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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
Route::get('/promotions', 'PromotionController@showPromotions')->name('promotions'); /* rotta per la visualizzazione delle promozioni */

Route::get('/listaOperatori', [Utente3Controller::class, 'showOperatori'])
        ->name('showOperatore');

Route::get('/selTopCat/{topCatId}', [PublicController::class, 'showCatalog2'])
        ->name('catalog2');

Route::get('/selTopCat/{topCatId}/selCat/{catId}', [PublicController::class, 'showCatalog3'])
        ->name('catalog3');

Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin');

Route::get('/admin/newproduct', [AdminController::class, 'addProduct'])
        ->name('newproduct');

Route::post('/admin/newproduct', [AdminController::class, 'storeProduct'])
        ->name('newproduct.store');

Route::get('/user', [UserController::class, 'index'])
        ->name('user')->middleware('can:isUser');

Route::get('/listaOperatori/Utente:{chiave}', [Utente3Controller::class, 'getOperatore'])
        ->name('operatore'); 
        /*route di tipo get 
        che chiama il metodo showOperatore di UserController
        e nomina la route 'operatore' così da poterla richiamare con
        route('operatore')
        */
Route::get('/listaOperatori/{chiave}/delete', [Utente3Controller::class, 'deleteOperatore'])
        ->name('deleteoperatore');
Route::get('/cliente', [Utente3Controller::class, 'getCliente'])
        ->name('cliente');
Route::get('/listaClienti', [Utente3Controller::class, 'deleteCliente'])
        ->name('deletecliente');
Route::get('/listaOperatori/aggiungiOperatore',[Utente3Controller::class, 'showFormOperatore'])
        ->name('aggiungioperatore');
Route::post('/listaOperatori/aggiungiOperatore/redirecting',[Utente3Controller::class, 'aggiungiOperatore'])
        ->name('aggiungioperatore2');
Route::post('/listaOperatori/modificaOperatore:{chiave}',[Utente3Controller::class, 'modificaOperatore'])
        ->name('modificaoperatore');
Route::post('/listaOperatori/modificaOperatore/salva',[Utente3Controller::class, 'salvaOperatore'])
        ->name('salvamodifiche');
Route::view('/where', 'where')
        ->name('where');

Route::view('/who', 'who')
        ->name('who');


/*  Rotte aggiunte da Breeze

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

*/
require __DIR__.'/auth.php';
