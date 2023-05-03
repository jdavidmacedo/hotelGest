@extends('adminlte::page')

@section('title', 'Lista de Reservas')

@section('content_header')
    <h1>Lista de Reservas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Hotel</th>
                    <th>Quarto</th>
                    <th>Data de Check-in</th>
                    <th>Data de Check-out</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->cliente->nome }} {{ $reserva->cliente->sobrenome }}</td>
                        <td>{{ $reserva->hotel->nome }}</td>
                        <td>{{ $reserva->quarto->numero_do_quarto }}</td>
                        <td>{{ $reserva->data_checkin }}</td>
                        <td>{{ $reserva->data_checkout }}</td>
                        <td>{{ $reserva->status }}</td>
                        <td>
                            <a href="{{ route('reserva.edit', $reserva->id) }}" class="btn btn-sm btn-info">Atualizar</a>
                            <form action="{{ route('reserva.destroy', $reserva->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
