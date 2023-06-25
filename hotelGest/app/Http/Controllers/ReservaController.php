<?php
namespace App\Http\Controllers;

use App\Models\QuartoEpoca;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Hotel;
use App\Models\Quarto;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function create()
    {
        $clientes = Cliente::all();
        $hoteis = Hotel::all();
        $quartos = Quarto::all();
        $quartos_epoca = QuartoEpoca::with('quarto')->get();
        return view('reserva.create', compact('clientes', 'hoteis', 'quartos', 'quartos_epoca'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_cliente' => 'required|integer|exists:cliente,id',
            'id_hotel' => 'required|integer|exists:hotel,id',
            'id_quarto_epoca' => 'required|integer|exists:quarto_epoca,id',
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date|after_or_equal:data_checkin',
            'status' => 'required|in:reservado,cancelado,concluido',
        ]);

        Reserva::create($validatedData);

        return redirect()->route('reserva.index')->with('success', 'Reserva criada com sucesso!');
    }

    public function index()
    {
        $reservas = Reserva::all();

        $reservas = Reserva::with('QuartoEpoca.quarto')->get();
        return view('reserva.index', compact('reservas'));
    }

    public function edit(Reserva $reserva )
    {
        //$reserva = Reserva::findOrFail($id);
        $clientes = Cliente::all();
        $hoteis = Hotel::all();
        //$quartos = Quarto::all();
        $quartos_epoca = QuartoEpoca::all();
        return view('reserva.edit', compact('reserva', 'clientes', 'hoteis','quartos_epoca'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $validatedData = $request->validate([
            'id_cliente' => 'required|integer|exists:cliente,id',
            'id_hotel' => 'required|integer|exists:hotel,id',
            //'id_quarto' => 'required|integer|exists:quartos,id',
            'id_quarto_epoca' => 'required|integer|exists:quarto_epoca,id',
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date|after_or_equal:data_checkin',
            'status' => 'required|in:reservado,cancelado,concluido',
        ]);

        //$reserva = Reserva::findOrFail($id);
        $reserva->update($validatedData);

        return redirect()->route('reserva.index')->with('success', 'Atualizado com sucesso!');
    }


    public function destroy(Reserva $reserva)
    {
        //$reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return redirect()->route('reserva.index')->with('success', 'Reserva excluída com sucesso!');
    }

}
