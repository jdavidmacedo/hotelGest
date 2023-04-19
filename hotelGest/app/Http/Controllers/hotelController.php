<?php

// app/Http/Controllers/hotelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;



class HotelController extends Controller
{
    public function create()
    {
        return view('hotel.create');
    }

    public function index()
    {
        $hoteis = hotel::all();
        return view('hotel.index', compact('hoteis'));
    }

    public function edit(hotel $hotel)
    {
        return view('hotel.edit', compact('hotel'));
    }

    public function update(Request $request, hotel $hotel)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:hotel,email,' . $hotel->id
        ]);
        $hotel->update($validatedData);

        return redirect()->route('hotel.index')->with('success', 'Hotel atualizado com sucesso!');
    }
    public function destroy(hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotel.index')->with('success', 'Hotel removido com sucesso!');
    }


    public function store(Request $request)
    {


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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:hotel,email'
        ]);

        hotel::create($validatedData);

        return redirect()->route('hotel.create')->with('success', 'Hotel criado com sucesso!');
    }
}
