<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function create()
    {
        return view('cliente.create');

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
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|unique:cliente,email|max:255',
            'telefone' => 'required|string',
            'endereco' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'data_nascimento' => 'date',
            'NIF' => 'string|max:255',
        ]);


        Cliente::create($validatedData);

        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        // regras de validação aqui

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|unique:cliente,email,' . $cliente->id . ',id|max:255',
            'telefone' => 'required|string',
            'endereco' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'data_nascimento' => 'date',
            'NIF' => 'string|max:255',
        ]);

        $cliente->update($validatedData);
        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        // Verifica se existem reservas vinculadas a esse cliente
        if ($cliente->reservas()->exists()) {
            // Redireciona de volta com uma mensagem de erro
            return redirect()->route('cliente.index')
                ->withErrors(['error' => 'Não é possível excluir o cliente pois ele possui reservas associadas.']);
        } else {
            $cliente->delete();
            return redirect()->route('cliente.index')->with('success', 'Cliente removido com sucesso!');
        }
    }


}
