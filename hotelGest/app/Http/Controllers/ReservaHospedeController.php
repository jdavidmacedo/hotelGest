<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\ReservaHospede;
use Illuminate\Http\Request;

class ReservaHospedeController extends Controller
{
    public function create()
    {
        $clientes = Cliente::all(); // Supondo que você tenha um modelo "Cliente"
        $reservas = Reserva::all(); // Supondo que você tenha um modelo "Reserva"

        return view('ReservaHospede.create', compact('clientes', 'reservas'));
    }


    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'id_cliente' => 'required',
            'id_reserva' => 'required',
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:reserva_hospede',
            'telefone' => 'required',
            'endereco' => 'required',
            'pais' => 'required',
            'data_nascimento' => 'nullable|date',
            'NIF' => 'nullable',
        ]);

        // Criação do novo registro de reserva de hóspede
        $reservaHospede = ReservaHospede::create($validatedData);

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('ReservaHospede.index')->with('success', 'Hóspede criado com sucesso!');
    }
    public function index()
    {
        $reservaHospedes = ReservaHospede::all();
        return view('ReservaHospede.index', compact('reservaHospedes'));
    }

    public function edit(ReservaHospede $reservaHospede)
    {
        $clientes = Cliente::all();
        $reservas = Reserva::all();

        return view('ReservaHospede.edit', compact('reservaHospede', 'clientes', 'reservas'));
    }


        public function update(Request $request, ReservaHospede $reservaHospede)
    {
        $validatedData = $request->validate([
            'id_cliente' => 'required',
            'id_reserva' => 'required',
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:reserva_hospede,email,' . $reservaHospede->id,
            'telefone' => 'required',
            'endereco' => 'required',
            'pais' => 'required',
            'data_nascimento' => 'nullable|date',
            'NIF' => 'nullable',
        ]);

        $reservaHospede->update($validatedData);

        return redirect()->route('ReservaHospede.index')->with('success', 'Registro atualizado com sucesso!');
    }
    public function destroy(ReservaHospede $reservaHospede)
    {
        $reservaHospede->delete();
        return redirect()->route('ReservaHospede.index')->with('success', 'Reserva de hóspede criada com sucesso!');

    }



}
