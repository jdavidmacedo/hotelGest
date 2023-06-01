<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fatura;
use App\Models\Fatura_Reserva;
use App\Models\Reserva;
use Illuminate\Http\Request;

class FaturaReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reservas  = Reserva::all();
        $faturas = Fatura::all();
        return view('faturareserva.create', compact('reservas', 'faturas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_reserva' => 'required|integer|exists:reserva,id',
            'id_fatura' => 'required|integer|exists:fatura,id',
        ]);

        Fatura_Reserva::create($validatedData);
        return redirect()->route('faturareserva.create')->with('success', 'Reserva criada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
