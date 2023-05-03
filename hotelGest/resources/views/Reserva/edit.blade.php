@extends('adminlte::page')

@section('title', 'Editar Reserva')

@section('content_header')
    <h1>Editar Reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('reserva.update', $reserva->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_cliente">Cliente:</label>
                    <select name="id_cliente" id="id_cliente" class="form-control" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $cliente->id == $reserva->id_cliente ? 'selected' : '' }}>{{ $cliente->nome }} {{ $cliente->sobrenome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_hotel">Hotel:</label>
                    <select name="id_hotel" id="id_hotel" class="form-control" required>
                        <option value="">Selecione um hotel</option>
                        @foreach($hoteis as $hotel)
                            <option value="{{ $hotel->id }}" {{ $hotel->id == $reserva->id_hotel ? 'selected' : '' }}>{{ $hotel->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_quarto">Quarto:</label>
                    <select name="id_quarto" id="id_quarto" class="form-control" required>
                        <option value="">Selecione um quarto</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}" {{ $quarto->id == $reserva->id_quarto ? 'selected' : '' }}>{{ $quarto->numero_do_quarto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="data_checkin">Data de Check-in:</label>
                    <input type="date" name="data_checkin" id="data_checkin" class="form-control" value="{{ $reserva->data_checkin }}" required>
                </div>
                <div class="form-group">
                    <label for="data_checkout">Data de Check-out:</label>
                    <input type="date" name="data_checkout" id="data_checkout" class="form-control" value="{{ $reserva->data_checkout }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="reservado" {{ $reserva->status == 'reservado' ? 'selected' : '' }}>Reservado</option>
                        <option value="cancelado" {{ $reserva->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        <option value="concluido" {{ $reserva->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('reserva.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
