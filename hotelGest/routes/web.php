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
    return view('hotel.createhotel');
});
Route::get('/createhotel', function () {

    $nome=request('nome');
    $email=request('email');
    $endereco=request('endereco');
    $cidade=request('cidade');
    $pais=request('pais');
    $telefone=request('telefone');

    DB::table('hotel')-> insert([
        'name'=> $nome,
        'email'=>$email,
        'endereco'=>$endereco,
        'pais'=>$pais,
        'cidade'=>$cidade,
        'telefone'=>$telefone,

    ]);


    return redirect('/hotel/createhotel')-> with('success', 'Form submitted successfully');
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
