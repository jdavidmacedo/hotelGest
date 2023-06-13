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
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente removido com sucesso!');
    }

}
