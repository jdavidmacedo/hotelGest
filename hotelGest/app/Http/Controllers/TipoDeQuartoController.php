<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\TipoDeQuarto;
use Illuminate\Http\Request;

class TipoDeQuartoController extends Controller
{
    public function create()
    {
        $hoteis = Hotel::all();
        return view('tipos_de_quarto.create', compact('hoteis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_hotel' => 'required|exists:hotel,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        TipoDeQuarto::create($validatedData);

        return redirect()->route('tipos_de_quarto.create')->with('success', 'Tipo de quarto criado com sucesso!');
    }
}

