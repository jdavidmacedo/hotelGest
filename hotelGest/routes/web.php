<?php

use App\Http\Controllers\TipoDeQuartoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hotelController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EpocaController;
use App\Http\Controllers\PrecoController;
use App\Http\Controllers\ReservaController;




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
    return view('welcome');
});

//Hotel
Route::get('/hotel/create', [HotelController::class, 'create'])->name('hotel.create');
Route::post('/hotel', [HotelController::class, 'store'])->name('hotel.store');
Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
Route::get('/hotel/edit/{hotel}', [HotelController::class, 'edit'])->name('hotel.edit');
Route::put('/hotel/{hotel}', [HotelController::class, 'update'])->name('hotel.update');
Route::delete('/hotel/{hotel}', [HotelController::class, 'destroy'])->name('hotel.destroy');

//Tipo de Quarto
Route::get('/TipoQuarto/create', [TipoDeQuartoController::class, 'create'])->name('TipoQuarto.create');
Route::post('/TipoQuarto', [TipoDeQuartoController::class, 'store'])->name('TipoQuarto.store');


//Quarto
Route::get('/quarto/create', [QuartoController::class, 'create'])->name('quartos.create');
Route::post('/quarto', [QuartoController::class, 'store'])->name('quartos.store');
Route::get('/quarto', [QuartoController::class, 'index'])->name('quartos.index');
Route::get('/quarto/edit/{quarto}', [QuartoController::class, 'edit'])->name('quartos.edit');
Route::put('/quarto/{quarto}', [QuartoController::class, 'update'])->name('quartos.update');
Route::delete('/quarto/{quarto}', [QuartoController::class, 'destroy'])->name('quartos.destroy');

//Cliente
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/edit/{cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

//Epoca

Route::get('/epoca/create', [EpocaController::class, 'create'])->name('epoca.create');
Route::post('/epoca/', [EpocaController::class, 'store'])->name('epoca.store');
Route::get('/epoca', [EpocaController::class, 'index'])->name('epoca.index');
Route::get('/epoca/edit/{epoca}', [EpocaController::class, 'edit'])->name('epoca.edit');
Route::put('/epoca/{epoca}', [EpocaController::class, 'update'])->name('epoca.update');
Route::delete('/epoca/{epoca}', [EpocaController::class, 'destroy'])->name('epoca.destroy');

//Preço

Route::get('/preco/create', [PrecoController::class, 'create'])->name('preco.create');
Route::post('/preco/', [PrecoController::class, 'store'])->name('preco.store');

//Reserva

Route::get('/reserva/create', [ReservaController::class, 'create'])->name('reserva.create');
Route::post('/reserva/', [ReservaController::class, 'store'])->name('reserva.store');
Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva.index');
Route::get('/reserva/edit/{reserva}',[ReservaController::class, 'edit'])->name('reserva.edit');
Route::put('/reserva/{reserva}', [ReservaController::class, 'update'])->name('reserva.update');
Route::delete('/reserva/{reserva}', [ReservaController::class, 'destroy'])->name('reserva.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
