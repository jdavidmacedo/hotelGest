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
            'cidade' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
        ]);

        Cliente::create($validatedData);

        return redirect()->route('cliente.create')->with('success', 'Cliente criado com sucesso!');
    }
}
