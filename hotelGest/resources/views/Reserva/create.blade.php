@extends('adminlte::page')

@section('title', 'Adicionar Reserva')

@section('content_header')
    <h1>Adicionar Reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

            <form action="{{ route('reserva.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_cliente">Cliente:</label>
                    <select name="id_cliente" id="id_cliente" class="form-control" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }} {{ $cliente->sobrenome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_hotel">Hotel:</label>
                    <select name="id_hotel" id="id_hotel" class="form-control" required>
                        <option value="">Selecione um hotel</option>
                        @foreach($hoteis as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_quarto_epoca">Quarto:</label>
                    <select name="id_quarto_epoca" id="id_quarto_epoca" class="form-control" required>
                        <option value="">Selecione um quarto</option>
                        @foreach($quartosEpoca as $quartoEpoca)
                            <option value="{{ $quartoEpoca->id }}">
                                {{ $quartoEpoca->quarto->numero_do_quarto }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_checkin">Data de Check-in:</label>
                    <input type="date" name="data_checkin" id="data_checkin" class="form-control" required
                           min="<?php echo date('Y-m-d'); ?>" max="9999-12-31">
                </div>
                <div class="form-group">
                    <label for="data_checkin">Data de Check-out:</label>
                    <input type="date" name="data_checkout" id="data_checkout" class="form-control" required
                           min="<?php echo date('Y-m-d'); ?>" max="9999-12-31">

                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="reservado">Reservado</option>
                        <option value="cancelado">Cancelado</option>
                        <option value="concluido">Concluído</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
