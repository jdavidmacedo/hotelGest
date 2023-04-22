<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use App\Models\Hotel;
use App\Models\TipoDeQuarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{


    public function create()
    {
        $hoteis = Hotel::all();
        $Tipos = TipoDeQuarto::all();
        return view('quartos.create', compact('hoteis', 'Tipos'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([


            'id_hotel' => 'required|integer|exists:hotel,id',
            'id_tipo_quartos' => 'required|integer|exists:tipo_de_quartos,id',
            'numero_do_quarto' => 'required|integer',
            'status' => 'required|in:disponivel,indisponivel,manutencao',
        ]);


        Quarto::create($validatedData);

        return redirect()->route('quartos.create')->with('success', 'Quarto criado com sucesso!');
    }



}
