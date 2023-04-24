<?php
namespace App\Http\Controllers;

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
        return view('reserva.create', compact('clientes', 'hoteis', 'quartos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_cliente' => 'required|integer|exists:cliente,id',
            'id_hotel' => 'required|integer|exists:hotel,id',
            'id_quarto' => 'required|integer|exists:quartos,id',
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date|after_or_equal:data_checkin',
            'status' => 'required|in:reservado,cancelado,concluido',
        ]);

        Reserva::create($validatedData);

        return redirect()->route('reserva.create')->with('success', 'Reserva criada com sucesso!');
    }
}
