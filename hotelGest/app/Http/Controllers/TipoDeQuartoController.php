<?php

// App\Http\Controllers\TipoQuartoController.php

namespace App\Http\Controllers;

use App\Models\TipoDeQuarto;
use Illuminate\Http\Request;

class TipoDeQuartoController extends Controller
{
    public function create()
    {
        return view('TipoQuarto.create');
    }

    public function index()
    {
        $Tipos = TipoDeQuarto::all();
        return view('TipoQuarto.index', compact('Tipos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        TipoDeQuarto::create($validatedData);

        return redirect()->route('TipoQuarto.create')->with('success', 'Tipo de quarto criado com sucesso!');
    }
    public function edit(TipoDeQuarto $tipoQuarto)
    {
        return view('TipoQuarto.edit', compact('tipoQuarto'));
    }
    public function update(Request $request, TipoDeQuarto $tipoQuarto)
    {
        $tipoQuarto->update($request->all());
        return redirect()->route('TipoQuarto.index')->with('success', 'Tipo de quarto atualizado com sucesso.');
    }

    public function destroy(TipoDeQuarto $tipoQuarto)
    {
        $tipoQuarto->delete();
        return redirect()->route('TipoQuarto.index')->with('success', 'Tipo de quarto excluído com sucesso.');
    }
}

