@extends('adminlte::page')

@section('title', 'Adicionar Preço')

@section('content_header')
    <h1>Adicionar Preço</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('preco.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_tipo_quartos">Tipo de Quarto:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="">Selecione um tipo de quarto</option>
                        @foreach($Tipos as $tipoDeQuarto)
                            <option value="{{ $tipoDeQuarto->id }}">{{ $tipoDeQuarto->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_epoca">Época:</label>
                    <select name="id_epoca" id="id_epoca" class="form-control" required>
                        <option value="">Selecione uma época</option>
                        @foreach($epocas as $epoca)
                            <option value="{{ $epoca->id }}">{{ $epoca->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" name="preco" id="preco" step="0.01" min="0" max="9999999999.99" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
