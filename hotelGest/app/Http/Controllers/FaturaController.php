<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Cookie' => 'PHPSESSID=1db6128aa8451306a7343eeee8ad5844'
          ])->post('https://devipvc.gesfaturacao.pt/gesfaturacao/server/webservices/api/mobile/v1.0.2/authentication', [
            
            'username' => 'ipvcweb2',
            'password' => 'ipvcweb2'
            ]);

        dd($response->body());

        return view('Fatura.create');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required|date',
            'valor_total' => 'required|numeric',
            'status' => 'required|string',
            'tipo_pagamento' => 'required|string',
        ]);

        Fatura::create($validatedData);

        return redirect()->route('Fatura.create')->with('success', 'Fatura criada com sucesso!');

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
