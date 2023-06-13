@extends('adminlte::page')

@section('title', 'Editar Hóspede')

@section('content_header')
    <h1>Editar Hóspede</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ReservaHospede.update', $reservaHospede) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_cliente">Cliente:</label>
                    <select name="id_cliente" id="id_cliente" class="form-control" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $cliente->id == $reservaHospede->id_cliente ? 'selected' : '' }}>{{ $cliente->nome }} {{ $cliente->sobrenome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_reserva">Reserva:</label>
                    <select name="id_reserva" id="id_reserva" class="form-control" required>
                        <option value="">Selecione uma reserva</option>
                        @foreach($reservas as $reserva)
                            <option value="{{ $reserva->id }}" {{ $reservaHospede->id_reserva == $reserva->id ? 'selected' : '' }}>
                                {{ $reserva->id }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $reservaHospede->nome }}" required>
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome" class="form-control" value="{{ $reservaHospede->sobrenome }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $reservaHospede->email }}" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" class="form-control" value="{{ $reservaHospede->telefone }}" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" value="{{ $reservaHospede->endereco }}" required>
                </div>
                <div class="form-group">
                    <label for="pais">País:</label>
                    <input type="text" name="pais" class="form-control" value="{{ $reservaHospede->pais }}" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" class="form-control" value="{{ $reservaHospede->data_nascimento }}" required>
                </div>
                <div class="form-group">
                    <label for="NIF">NIF:</label>
                    <input type="text" name="NIF" class="form-control" value="{{ $reservaHospede->NIF }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('ReservaHospede.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
