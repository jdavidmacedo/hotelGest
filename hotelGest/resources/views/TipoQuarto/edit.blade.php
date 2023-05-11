@extends('adminlte::page')

@section('title', 'Editar Tipo de Quarto')
@extends('adminlte::page')

@section('content_header')
    <h1>Editar Tipo de quarto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('TipoQuarto.update', $tipoQuarto->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $tipoQuarto->nome }}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" required>{{ $tipoQuarto->descricao }}</textarea>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" name="preco" id="preco" class="form-control" step="0.01" value="{{ $tipoQuarto->preco }}" required>
                </div>
                <div class="form-group">
                    <label for="capacidade_maxima">Capacidade Máxima:</label>
                    <input type="number" name="capacidade_maxima" id="capacidade_maxima" class="form-control" value="{{ $tipoQuarto->capacidade_maxima }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('TipoQuarto.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
