@extends('adminlte::page')

@section('title', 'Adicionar')

@section('content_header')
    <h1>Adicionar </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Tipo_quarto_epoca.store') }}" method="post">
             @csrf
                <div class="form-group">
                    <label for="id_quarto">Quarto:</label>
                    <select name="id_quarto" id="id_quarto" class="form-control" required>
                        <option value="">Selecione um quarto</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}">{{ $quarto->numero_do_quarto }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_tipo_quartos">Tipo de quarto:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="" disabled selected>Selecione um tipo de quarto</option>
                        @foreach($Tipos as $TipoDeQuarto)
                            <option value="{{ $TipoDeQuarto->id }}">{{ $TipoDeQuarto->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_tipo_quartos">Epocas:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="" disabled selected>Selecione</option>
                        @foreach($epocas as $Epoca)
                            <option value="{{ $Epoca->id }}">{{ $Epoca->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco">Preço Base por Noite:</label>
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
