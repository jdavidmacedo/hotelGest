<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hotelController;

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






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
