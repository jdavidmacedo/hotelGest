<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quarto;
use App\Models\Reserva;
use App\Models\ReservaQuarto;
use Illuminate\Http\Request;

class ReservaQuartoController extends Controller
{
    public function create()
    {
        $reservas = Reserva::all();
        $quartos = Quarto::all();

        return view('ReservaQuartos.create', compact('reservas', 'quartos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_reserva' => 'required|integer|exists:reserva,id',
            'id_quarto' => 'required|array',
            'id_quarto.*' => 'integer|exists:quartos,id',
        ]);

        $reserva = Reserva::findOrFail($validatedData['id_reserva']);

        foreach ($validatedData['id_quarto'] as $quartoId) {
            $reservaQuarto = new ReservaQuarto();
            $reservaQuarto->id_reserva = $reserva->id;
            $reservaQuarto->id_quarto = $quartoId;
            $reservaQuarto->save();
        }

        return redirect()->route('ReservaQuartos.create')->with('success', 'Reserva criada com sucesso!');
    }
    public function index()
    {
        $reservaQuartos = ReservaQuarto::all();
        return view('ReservaQuartos.index', compact('reservaQuartos'));
    }

    public function edit($id)
    {
        $reservaQuarto = ReservaQuarto::findOrFail($id);
        $reservas = Reserva::all();
        $quartos = Quarto::all();

        return view('ReservaQuartos.edit', compact('reservaQuarto', 'reservas', 'quartos'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_reserva' => 'required|integer|exists:reserva,id',
            'id_quarto' => 'required|array',
            'id_quarto.*' => 'integer|exists:quartos,id',
        ]);

        $reservaQuarto = ReservaQuarto::findOrFail($id);
        $reservaQuarto->id_reserva = $validatedData['id_reserva'];
        $reservaQuarto->id_quarto = $validatedData['id_quarto'][0]; // Ajuste aqui para pegar o primeiro valor do array
        $reservaQuarto->save();

        return redirect()->route('ReservaQuartos.index')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $reservaQuarto = ReservaQuarto::findOrFail($id);
        $reservaQuarto->delete();

        return redirect()->route('ReservaQuartos.index')->with('success', 'Reserva excluída com sucesso!');
    }
}

