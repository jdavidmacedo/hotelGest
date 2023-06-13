@extends('adminlte::page')

@section('title', 'Adicionar ')

@section('content_header')
    <h1>Adicionar </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('QuartoEpoca.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_quarto">Quartos:</label>
                    <select name="id_quarto" id="id_quarto" class="form-control" required>
                        <option value="">Selecione um quarto</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}">{{ $quarto->numero_do_quarto }}</option>
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
                    <label for="id_tipo_quartos">Tipo de quarto:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="">Selecione um tipo de quarto</option>
                        @foreach($Tipos as $tipoQuarto)
                            <option value="{{ $tipoQuarto->id }}">{{ $tipoQuarto->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco_base_por_noite">Preço base por noite:</label>
                    <input type="number" name="preco_base_por_noite" id="preco_base_por_noite" class="form-control" required step="0.01">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
