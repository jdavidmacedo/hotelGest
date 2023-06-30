<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cliente, Hotel, QuartoEpoca, Reserva};

class ReservaController extends Controller
{
    public function create()
    {
        $clientes = Cliente::all();
        $hoteis = Hotel::all();
        $quartosEpoca = QuartoEpoca::all();

        return view('reserva.create', compact('clientes', 'hoteis', 'quartosEpoca'));
    }

    public function store(Request $request)
    {
        // Obtém todas as reservas para o quarto desejado.
        $reservasExistentes = Reserva::where('id_quarto_epoca', $request->id_quarto_epoca)->get();

        $dataCheckin = \Carbon\Carbon::parse($request->data_checkin);
        $dataCheckout = \Carbon\Carbon::parse($request->data_checkout);

        // Verifica se há alguma reserva existente que se sobreponha à nova reserva.
        foreach ($reservasExistentes as $reservaExistente) {
            $reservaCheckin = \Carbon\Carbon::parse($reservaExistente->data_checkin);
            $reservaCheckout = \Carbon\Carbon::parse($reservaExistente->data_checkout);

            if ($dataCheckin->between($reservaCheckin, $reservaCheckout) ||
                $dataCheckout->between($reservaCheckin, $reservaCheckout) ||
                ($dataCheckin->lte($reservaCheckin) && $dataCheckout->gte($reservaCheckout))) {

                // Se houver sobreposição, redireciona de volta para o formulário com um erro.
                return redirect()->back()->withErrors(['error' => 'Este quarto não está disponível nas datas selecionadas.']);
            }
        }

        // Se não houver sobreposição, prossegue com a criação da reserva.
        $reserva = new Reserva;

        $reserva->id_cliente = $request->id_cliente;
        $reserva->id_hotel = $request->id_hotel;
        $reserva->id_quarto_epoca = $request->id_quarto_epoca;
        $reserva->data_checkin = $request->data_checkin;
        $reserva->data_checkout = $request->data_checkout;
        $reserva->status = $request->status;

        $reserva->save();

        return redirect()->route('reserva.index');
    }


    public function index()
    {
        $reservas = Reserva::all();

        return view('reserva.index', compact('reservas'));
    }

    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $clientes = Cliente::all();
        $hoteis = Hotel::all();
        $quartosEpoca = QuartoEpoca::all();

        return view('reserva.edit', compact('reserva', 'clientes', 'hoteis', 'quartosEpoca'));
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);


        $reserva->id_cliente = $request->id_cliente;
        $reserva->id_hotel = $request->id_hotel;
        $reserva->id_quarto_epoca = $request->id_quarto_epoca;
        $reserva->data_checkin = $request->data_checkin;
        $reserva->data_checkout = $request->data_checkout;
        $reserva->status = $request->status;


        $reserva->save();

        return redirect()->route('reserva.index');
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();

        return redirect()->route('reserva.index');
    }
}
