<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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

    public function apiRequest()
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
                $accessToken = $responseData['access_token'];
            
                // Armazenar o token de acesso na sessão
                session(['access_token' => $accessToken]);
             }else {
                // O pedido de autenticação falhou
                $errorCode = $response->status();
                $errorMessage = $response->body();
            
                // Trate o erro de acordo com suas necessidades
            
                return redirect()->back()->withErrors('Falha na autenticação'); // Ou redirecione de volta com uma mensagem de erro
            }
            
    }    
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
    }
}
