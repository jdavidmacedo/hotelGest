@extends('adminlte::page')

@section('title', 'Editar Reserva')

@section('content_header')
    <h1>Editar Reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('ReservaQuartos.update', $reservaQuarto->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_reserva">Reserva:</label>
                    <select name="id_reserva" id="id_reserva" class="form-control" required>
                        <option value="">Selecione uma reserva</option>
                        @foreach($reservas as $reserva)
                            <option value="{{ $reserva->id }}" @if($reservaQuarto->id_reserva == $reserva->id) selected @endif>{{ $reserva->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_quarto">Quartos:</label>
                    <select name="id_quarto[]" id="id_quarto" class="form-control" required multiple>
                        <option value="">Selecione um ou mais quartos</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}" @if(in_array($quarto->id, $reservaQuarto->quarto->pluck('id')->toArray())) selected @endif>{{ $quarto->numero_do_quarto }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('ReservaQuartos.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
