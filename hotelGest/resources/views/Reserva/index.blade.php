@extends('adminlte::page')

@section('title', 'Lista de Reservas')

@section('content_header')
    <h1>Lista de Reservas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('reserva.create') }}" class="btn btn-primary">Criar Reserva</a>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
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
                            <th>Preço Total</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id }}</td>
                                <td>{{ $reserva->cliente->nome }} {{ $reserva->cliente->sobrenome }}</td>
                                <td>{{ $reserva->hotel->nome }}</td>
                                <td>{{ $reserva->quartoEpoca->quarto->numero_do_quarto }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->data_checkin)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->data_checkout)->format('d/m/Y') }}</td>
                                <td>{{ $reserva->status }}</td>
                                <td>
                                    @php
                                        $checkin = \Carbon\Carbon::parse($reserva->data_checkin);
                                        $checkout = \Carbon\Carbon::parse($reserva->data_checkout);
                                        $noites = $checkin->diffInDays($checkout);
                                        $precoTotal = $noites * $reserva->quartoEpoca->preco_por_noite;
                                    @endphp
                                    {{ $precoTotal }}
                                </td>
                                <td>
                                    <a href="{{ route('reserva.edit', $reserva->id) }}" class="btn btn-sm btn-info">Atualizar</a>
                                    <form action="{{ route('reserva.destroy', $reserva->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@stop
