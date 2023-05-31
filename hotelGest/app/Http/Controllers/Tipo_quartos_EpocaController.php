<?php

namespace App\Http\Controllers;

use App\Models\Epoca;
use App\Models\Quarto;
use App\Models\Tipo_quarto_epoca;
use App\Models\TipoDeQuarto;
use Illuminate\Http\Request;

class Tipo_quartos_EpocaController extends Controller
{
    public function create()
    {
        $quartos = Quarto::all();
        $Tipos = TipoDeQuarto::all();
        $epocas = Epoca::all();
        return view('Tipo_quarto_epoca.create', compact('Tipos', 'epocas', 'quartos'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'id_quarto' => 'required|integer',
            'id_epoca' => 'required|integer',
            'id_tipo_quartos' => 'required|integer',
            'preco_base_por_noite' => 'required|numeric',
        ]);

        Tipo_quarto_epoca::create($validatedData);

        // Redirecionamento ou resposta de sucesso
        return redirect()->route('Tipo_quarto_epoca.store')->with('success', 'Quarto criado com sucesso!');

    }

    public function index()
    {
        $tipoQuartoEpocas = Tipo_quarto_epoca::all();
        return view('Tipo_quarto_epoca.index', compact('tipoQuartoEpocas'));
    }

    public function edit(Tipo_quarto_epoca $tipoQuartoEpoca)
    {
        $quartos = Quarto::all();
        $Tipos = TipoDeQuarto::all();
        $epocas = Epoca::all();
        return view('Tipo_quarto_epoca.edit', compact('tipoQuartoEpoca','quartos', 'Tipos', 'epocas'));
        //return view('tipo-quarto-epoca.edit', compact('tipoQuartoEpoca'));
    }

    public function update(Request $request, Tipo_quarto_epoca $tipoQuartoEpoca)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'id_quarto' => 'required|integer',
            'id_epoca' => 'required|integer',
            'id_tipo_quartos' => 'required|integer',
            'preco_base_por_noite' => 'required|numeric',
        ]);

        // Atualização dos dados da reserva
        $tipoQuartoEpoca->update($validatedData);

        // Redirecionamento ou resposta de sucesso
        return redirect()->route('Tipo_quarto_epoca.index')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy(Tipo_quarto_epoca $tipoQuartoEpoca)
    {
        $tipoQuartoEpoca->delete();
        return redirect()->route('Tipo_quarto_epoca.index')->with('success', 'excluída com sucesso!');
    }





}

