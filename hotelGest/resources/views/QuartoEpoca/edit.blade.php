@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('QuartoEpoca.update', $quartoEpoca->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_quarto">Quarto:</label>
                    <input type="text" name="id_quarto" id="id_quarto" class="form-control" value="{{ $quartoEpoca->id_quarto }}" required>
                </div>
                <div class="form-group">
                    <label for="id_epoca">Época:</label>
                    <input type="text" name="id_epoca" id="id_epoca" class="form-control" value="{{ $quartoEpoca->id_epoca }}" required>
                </div>
                <div class="form-group">
                    <label for="id_tipo_quartos">Tipo de quarto:</label>
                    <input type="text" name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" value="{{ $quartoEpoca->id_tipo_quartos }}" required>
                </div>
                <div class="form-group">
                    <label for="preco_base_por_noite">Preço base por noite:</label>
                    <input type="number" name="preco_base_por_noite" id="preco_base_por_noite" class="form-control" value="{{ $quartoEpoca->preco_base_por_noite }}" required step="0.01">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('QuartoEpoca.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
