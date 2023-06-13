<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FaturaController extends Controller
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
        $numero = str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        // Gera um número aleatório de 8 caracteres

        return view('Fatura.create', compact('numero'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero' => 'required|string',
            'data' => 'required|date',
            'valor_total' => 'required|numeric',
            'status' => 'required|string',
            'tipo_pagamento' => 'required|string',
        ]);
        $validatedData['numero'] = $numero = str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        // Gera um número aleatório de 8 caracteres

        Fatura::create($validatedData);

        return redirect()->route('Fatura.index')->with('success', 'Fatura criada com sucesso!');

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
