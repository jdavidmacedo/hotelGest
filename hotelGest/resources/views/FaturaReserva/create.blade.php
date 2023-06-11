@extends('adminlte::page')

@section('title', 'Adicionar')

@section('content_header')
    <h1>Adicionar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('faturareserva.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_reserva">Reserva:</label>
                    <select name="id_reserva" id="id_reserva" class="form-control" required>
                        <option value="">Selecione uma reserva</option>
                        @foreach($reservas as $reserva)
                            <option value="{{ $reserva->id }}">{{ $reserva->id }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_fatura">Fatura:</label>
                    <select name="id_fatura" id="id_fatura" class="form-control" required>
                        <option value="">Selecione uma fatura</option>
                        @foreach($faturas as $fatura)
                            <option value="{{ $fatura->id }}">{{ $fatura->numero}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@stop
