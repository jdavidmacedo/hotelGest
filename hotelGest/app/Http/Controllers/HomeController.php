<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $token;

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Cookie' => 'PHPSESSID=1db6128aa8451306a7343eeee8ad5844'
        ])->post('https://devipvc.gesfaturacao.pt/gesfaturacao/server/webservices/api/mobile/v1.0.2/authentication', [
            
        'username' => 'ipvcweb2',
        'password' => 'ipvcweb2'
        ]);

        if ($response->successful()) {
            // O pedido de autenticação foi bem-sucedido
            $responseData = $response->json();
        
            // Extrair o token de acesso da resposta
            $accessToken = $responseData['_token'];
        
            // Armazenar o token de acesso na sessão
            session(['access_token' => $accessToken]);

         }else {
            // O pedido de autenticação falhou
            $errorCode = $response->status();
            $errorMessage = $response->body();
        
            //dd($errorMessage);
        }
        return view('home');
    }
}
