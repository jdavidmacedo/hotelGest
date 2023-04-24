@extends('adminlte::page')

@section('title', 'Editar Época')

@section('content_header')
    <h1>Editar Época</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('epoca.update', $epoca) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $epoca->nome }}" required>
                </div>
                <div class="form-group">
                    <label for="data_inicio">Data de Início:</label>
                    <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ $epoca->data_inicio }}" required>
                </div>
                <div class="form-group">
                    <label for="data_fim">Data de Fim:</label>
                    <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ $epoca->data_fim }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('epoca.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
