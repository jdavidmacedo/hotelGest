<?php

// app/Http/Controllers/hotelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function create()
    {
        return view('hotel.create');
    }

    public function index()
    {
        $hotel = Hotel::all();
        return view('hotel.index', compact('hotel'));
    }

    public function edit(hotel $hotel)
    {
        return view('hotel.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {

        $hotel->update($request->all());

        return redirect()->route('hotel.index')->with('success', 'Hotel atualizado com sucesso!');
    }

    public function destroy(hotel $hotel)
    {
        if($hotel->quartos()->exists()){
            return redirect()->route('hotel.index')->with('error', 'Hotel possui quartos associados e não pode ser removido!');
        }

        $hotel->delete();
        return redirect()->route('hotel.index')->with('success', 'Hotel removido com sucesso!');
    }


    public function store(Request $request)
    {
        $hotel = hotel::create($request->all());

        return redirect()->route('hotel.index')->with('success', 'Hotel criado com sucesso!');
    }
}
