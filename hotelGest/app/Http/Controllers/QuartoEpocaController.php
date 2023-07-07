<?php

namespace App\Http\Controllers;

use App\Models\Epoca;
use App\Models\Quarto;
use App\Models\QuartoEpoca;
use App\Models\TipoDeQuarto;
use Illuminate\Http\Request;

class QuartoEpocaController extends Controller
{
    public function create()
    {
        $quartos = Quarto::all();
        $Tipos = TipoDeQuarto::all();
        $epocas = Epoca::all();

        return view('QuartoEpoca.create', compact('quartos', 'Tipos', 'epocas'));

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_quarto' => 'required|integer',
            'id_epoca' => 'required|integer',
            'id_tipo_quartos' => 'required|integer',
            'preco_base_por_noite' => 'required|numeric',
        ]);

        QuartoEpoca::create($data);

        return redirect()->route('QuartoEpoca.index')->with('success', 'Registro de quarto_epoca criado com sucesso!');

    }
    public function index()
    {
        $quartoEpocas = QuartoEpoca::all();
        return view('QuartoEpoca.index', compact('quartoEpocas'));
    }
    public function edit($id)
    {
        $quartoEpoca = QuartoEpoca::findOrFail($id);
        $quartos = Quarto::all();
        $Tipos = TipoDeQuarto::all();
        $epocas = Epoca::all();
        return view('QuartoEpoca.edit', compact('quartoEpoca', 'quartos', 'epocas', 'Tipos'));
    }
    public function update(Request $request, $id)
    {
        $quartoEpoca = QuartoEpoca::findOrFail($id);

        $data = $request->validate([
            'id_quarto' => 'required|integer',
            'id_epoca' => 'required|integer',
            'id_tipo_quartos' => 'required|integer',
            'preco_base_por_noite' => 'required|numeric',
        ]);

        $quartoEpoca->update($data);

        return redirect()->route('QuartoEpoca.index')->with('Registro de quarto_epoca atualizado com sucesso!');

    }

    public function destroy($id)
    {
        $quartoEpoca = QuartoEpoca::findOrFail($id);

        // Verifica se o QuartoEpoca está associado a alguma Reserva
        if ($quartoEpoca->reservas()->count() > 0) {
            return redirect()->route('QuartoEpoca.index')->with('error', 'Este Preço não pode ser excluído porque está associado a uma ou mais reservas.');
        }

        $quartoEpoca->delete();

        return redirect()->route('QuartoEpoca.index')->with('success', 'Registro de preço excluído com sucesso!');
    }


}
