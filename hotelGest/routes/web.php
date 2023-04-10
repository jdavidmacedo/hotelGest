<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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


Route::post('/hotel/createhotel', function () {

    $nome=request('nome');
    $email=request('email');
    $endereco=request('endereco');
    $cidade=request('cidade');
    $pais=request('pais');
    $telefone=request('telefone');

    DB::table('hotel')-> insert([
        'nome'=> $nome,
        'email'=>$email,
        'endereco'=>$endereco,
        'pais'=>$pais,
        'cidade'=>$cidade,
        'telefone'=>$telefone,

    ]);


    return redirect('/hotel/createhotel')-> with('success', 'form submited successfullly');
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
