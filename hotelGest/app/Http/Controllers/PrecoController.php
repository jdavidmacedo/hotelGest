<?php
namespace App\Http\Controllers;

use App\Models\Preco;
use App\Models\TipoDeQuarto;
use App\Models\Epoca;
use Illuminate\Http\Request;

class PrecoController extends Controller
{
    public function create()
    {
        $Tipos = TipoDeQuarto::all();
        $epocas = Epoca::all();
        return view('preco.create', compact('epocas', 'Tipos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tipo_quartos' => 'required|integer|exists:tipo_quartos,id',
            'id_epoca' => 'required|integer|exists:epocas,id',
            'preco' => 'required|numeric|min:0|max:9999999999.99',
        ]);

        Preco::create($validatedData);

        return redirect()->route('preco.create')->with('success', 'Preço criado com sucesso!');
    }
}
