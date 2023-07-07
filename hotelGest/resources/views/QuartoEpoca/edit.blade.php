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
                    <select name="id_quarto" id="id_quarto" class="form-control" required>
                        <option value="">Selecione um quarto</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}" {{ $quarto->id == $quartoEpoca->id_quarto ? 'selected' : '' }}>
                                {{ $quarto->numero_do_quarto }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_epoca">Época:</label>
                    <select name="id_epoca" id="id_epoca" class="form-control" required>
                        <option value="">Selecione uma época</option>
                        @foreach($epocas as $epoca)
                            <option value="{{ $epoca->id }}" {{ $epoca->id == $quartoEpoca->id_epoca ? 'selected' : '' }}>
                                {{ $epoca->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_tipo_quartos">Tipo de quarto:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="">Selecione um tipo de quarto</option>
                        @foreach($Tipos as $tipoQuarto)
                            <option value="{{ $tipoQuarto->id }}" {{ $tipoQuarto->id == $quartoEpoca->id_tipo_quartos ? 'selected' : '' }}>
                                {{ $tipoQuarto->nome }}
                            </option>
                        @endforeach
                    </select>
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
