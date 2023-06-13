<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/x-www-form-urlencoded',
        //     'Cookie' => 'PHPSESSID=1db6128aa8451306a7343eeee8ad5844'
        //   ])->post('https://devipvc.gesfaturacao.pt/gesfaturacao/server/webservices/api/mobile/v1.0.2/authentication', [
            
        //     'username' => 'ipvcweb2',
        //     'password' => 'ipvcweb2'
        //     ]);

        // dd($response->body());

        

        return view('Fatura.create');

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

        //Dados para enviar na API
        $apiData = [
            'date' => $validatedData['data'],
            'paymentMethod' => $validatedData['tipo_pagamento'],
        ];

        // Obter o token de acesso da sessão
        $accessToken = session('access_token');
      
        return redirect()->route('Fatura.index')->with('success', 'Fatura criada com sucesso!');

        // Fazer a chamada para a API com o método POST
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post('https://devipvc.gesfaturacao.pt/gesfaturacao/server/webservices/api/mobile/v1.0.2/receipts', $apiData);

        if ($response->successful()) {
            // O pedido POST foi bem-sucedido
            $responseData = $response->json();
            
            echo $responseData;

            // Faça algo com a resposta recebida

            return redirect()->route('Fatura.create')->with('success', 'Fatura criada com sucesso!');
            
        } else {
            // O pedido POST falhou
            $errorCode = $response->status();
            $errorMessage = $response->body();

            // Trate o erro de acordo com suas necessidades
            return redirect()->back()->with('error', 'Erro ao criar a fatura: ' . $errorMessage);
        }

        Fatura::create($validatedData);
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
