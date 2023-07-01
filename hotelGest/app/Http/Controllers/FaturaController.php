<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


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
    
        $accessToken = session('access_token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => $accessToken
        ])->post('https://devipvc.gesfaturacao.pt/gesfaturacao/server/webservices/api/mobile/v1.0.2/receipts', [
            'client' => 1,
            'number' => 1,
            'date' => '23/07/2023',
            'observations' => 'Teste hotelGest',
        ]);

        Fatura::create($validatedData);

        dd($response->json());
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
