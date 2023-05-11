<?php
namespace App\Http\Controllers;

use App\Models\Epoca;
use Illuminate\Http\Request;

class EpocaController extends Controller
{
    public function create()
    {
        return view('epoca.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        Epoca::create($validatedData);

        return redirect()->route('epoca.create')->with('success', 'Época criada com sucesso!');
    }

    public function index()
    {
        $epocas = Epoca::all();
        return view('epoca.index', compact('epocas'));
    }

    public function edit(Epoca $epoca)
    {
        return view('epoca.edit', compact('epoca'));
    }

    public function update(Request $request, Epoca $epoca)
    {
        // regras de validação
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $epoca->update($validatedData);
        return redirect()->route('epoca.index')->with('success', 'Época atualizada com sucesso!');
    }

    public function destroy(Epoca $epoca)
    {
        $epoca->delete();
        return redirect()->route('epoca.index')->with('success', 'Época removida com sucesso!');
    }
}

