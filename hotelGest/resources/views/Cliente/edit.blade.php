@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.update', $cliente) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $cliente->nome }}" required>
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome" class="form-control" value="{{ $cliente->sobrenome }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" value="{{ $cliente->endereco }}" required>
                </div>
                <div class="form-group">
                    <label for="pais">País:</label>
                    <input type="text" name="pais" class="form-control" value="{{ $cliente->pais }}" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" class="form-control" value="{{ $cliente->data_nascimento }}" required>
                </div>
                <div class="form-group">
                    <label for="NIF">NIF:</label>
                    <input type="text" name="NIF" class="form-control" value="{{ $cliente->NIF }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('cliente.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
