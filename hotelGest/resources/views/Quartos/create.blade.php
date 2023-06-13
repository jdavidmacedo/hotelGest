@extends('adminlte::page')

@section('title', 'Adicionar Quarto')

@section('content_header')
    <h1>Adicionar Quarto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('quartos.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_hotel">Hotel:</label>
                    <select name="id_hotel" id="id_hotel" class="form-control" required>
                        <option value="" disabled selected>Selecione um hotel</option>
                        @foreach($hoteis as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->nome }}</option>
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
                    <label for="numero_do_quarto">Número do quarto:</label>
                    <input type="number" name="numero_do_quarto" id="numero_do_quarto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="" disabled selected>Selecione um status</option>
                        <option value="disponivel">Disponível</option>
                        <option value="indisponivel">Indisponível</option>
                        <option value="manutencao">Manutenção</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="piso">Piso:</label>
                    <input type="text" name="piso" id="piso" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
