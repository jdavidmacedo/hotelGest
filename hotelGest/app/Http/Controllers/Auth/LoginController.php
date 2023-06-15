<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */  

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
                $this->middleware('guest')->except('logout');

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

                dd($accessToken);

             }else {
                // O pedido de autenticação falhou
                $errorCode = $response->status();
                $errorMessage = $response->body();
            
                dd($errorMessage);
            }
    }
}
