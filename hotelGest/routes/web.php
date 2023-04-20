<?php

use App\Http\Controllers\TipoDeQuartoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hotelController;
use App\Http\Controllers\QuartoController;

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

Route::get('/hotel/create', [HotelController::class, 'create'])->name('hotel.create');
Route::post('/hotel', [HotelController::class, 'store'])->name('hotel.store');

Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
Route::get('/hotel/edit/{hotel}', [HotelController::class, 'edit'])->name('hotel.edit');
Route::put('/hotel/{hotel}', [HotelController::class, 'update'])->name('hotel.update');
Route::delete('/hotel/{hotel}', [HotelController::class, 'destroy'])->name('hotel.destroy');

Route::get('/TipoQuarto/create', [TipoDeQuartoController::class, 'create'])->name('TipoQuarto.create');
Route::post('/TipoQuarto', [TipoDeQuartoController::class, 'store'])->name('TipoQuarto.store');

Route::get('/quarto/create', [TipoDeQuartoController::class, 'create'])->name('quarto.create');
Route::get('/quarto', [QuartoController::class, 'store'])->name('quarto.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
