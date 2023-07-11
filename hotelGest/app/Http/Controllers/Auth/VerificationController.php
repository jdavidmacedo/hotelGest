<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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

        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
