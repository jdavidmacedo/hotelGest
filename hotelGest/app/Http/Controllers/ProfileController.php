<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = Auth::user();

        $token ='0';

        $response = Http::withOptions(['verify' => false])
            ->withHeaders([
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

        } else {
            // O pedido de autenticação falhou
            $errorCode = $response->status();
            $errorMessage = $response->body();

            // dd($errorMessage);
        }

        return view('profile.show', compact('user'));

    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Perfil atualizado com sucesso!');
    }

}

