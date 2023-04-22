<?php

// App\Http\Controllers\TipoQuartoController.php

namespace App\Http\Controllers;

use App\Models\TipoDeQuarto;
use App\Models\Hotel;
use Illuminate\Http\Request;

class TipoDeQuartoController extends Controller
{
    public function create()
    {
        $hotels = Hotel::all();
        return view('TipoQuarto.create', compact('hotels'));
    }

    public function index()
    {
        $Tipos = TipoDeQuarto::all();
        return view('hotel.index', compact('Tipos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_hotel' => 'required|integer|exists:hotel,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        TipoDeQuarto::create($validatedData);

        return redirect()->route('TipoQuarto.create')->with('success', 'Tipo de quarto criado com sucesso!');
    }
}

