<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hotelController;
use App\Http\Controllers\TipoDeQuartoController;

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

Route::get('/hotel/createhotel', function () {
    return view('/hotel/createhotel');
});
Route::get('/TipoQuarto/createtipo', function () {
    return view('/TipoQuarto/createtipo');
});


Route::get('/hotel/create', [HotelController::class, 'create'])->name('hotel.create');
Route::post('/hotel', [HotelController::class, 'store'])->name('hotel.store');



Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
Route::get('/hotel/edit/{hotel}', [HotelController::class, 'edit'])->name('hotel.edit');
Route::put('/hotel/{hotel}', [HotelController::class, 'update'])->name('hotel.update');
Route::delete('/hotel/{hotel}', [HotelController::class, 'destroy'])->name('hotel.destroy');



Route::get('/TipoDeQuarto/create', [TipoDeQuartoController::class, 'create'])->name('TipoDeQuarto.create');
Route::post('/TipoDeQuarto', [TipoDeQuartoController::class, 'store'])->name('TipoDeQuarto.store');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
