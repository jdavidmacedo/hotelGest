<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use App\Models\Hotel;
use App\Models\TipoDeQuarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{

    public function index()
    {
        $quartos = Quarto::all();
        return view('quartos.index', compact('quartos'));
    }

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
            'id_tipo_quartos' => 'required|integer|exists:tipo_quartos,id',
            'numero_do_quarto' => 'required|integer',
            'status' => 'required|in:disponivel,indisponivel,manutencao',
            'descricao' => 'nullable|string',
            'piso' => 'nullable|string',
        ]);



        Quarto::create($validatedData);

        return redirect()->route('quartos.index')->with('success', 'Quarto criado com sucesso!');
    }

    public function edit(Quarto $quarto)
    {
        //$quarto = Quarto::findOrFail($id);
        $hoteis = Hotel::all();
        $Tipos = TipoDeQuarto::all();
        return view('quartos.edit', compact('quarto', 'hoteis', 'Tipos'));
    }

    public function update(Request $request, Quarto $quarto)
    {
        //$quarto = Quarto::findOrFail($id);
        $quarto->update($request->all());
        return redirect()->route('quartos.index')->with('success', 'Quarto atualizado com sucesso!');
    }

    public function destroy(Quarto $quarto)
    {
        // Verificar se o quarto está associado a algum quarto_epoca
        if ($quarto->quartoEpocas()->exists()) {
            return redirect()->route('quartos.index')->with('error', 'Não é possível excluir este quarto, pois está associado a um preço.');
        }

        $quarto->delete();
        return redirect()->route('quartos.index')->with('success', 'Quarto removido com sucesso!');
    }





}
