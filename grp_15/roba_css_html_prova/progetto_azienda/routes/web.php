<?php

use App\Http\Controllers\AziendeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OperatoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\UtentiController;

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



Route::get('/',[ProvaController::class, 'home'])->name('home.index');


Route::resource('aziende',AziendeController::class);
route::resource('operatori',OperatoriController::class);
Route::resource('utenti', UtentiController::class);
