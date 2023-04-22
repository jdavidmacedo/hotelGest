@extends('adminlte::page')

@section('title', 'Editar Quarto')

@section('content_header')
    <h1>Editar Quarto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('quartos.update', $quarto->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_hotel">Hotel:</label>
                    <select name="id_hotel" id="id_hotel" class="form-control" required>
                        <option value="" disabled selected>Selecione um hotel</option>
                        @foreach($hoteis as $hotel)
                            <option value="{{ $hotel->id }}" {{ $quarto->id_hotel == $hotel->id ? 'selected' : '' }}>{{ $hotel->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_tipo_quartos">Tipo de quarto:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="" disabled selected>Selecione um tipo de quarto</option>
                        @foreach($Tipos as $TipoDeQuarto)
                            <option value="{{ $TipoDeQuarto->id }}" {{ $quarto->id_tipo_quartos == $TipoDeQuarto->id ? 'selected' : '' }}>{{ $TipoDeQuarto->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero_do_quarto">Número do quarto:</label>
                    <input type="number" name="numero_do_quarto" id="numero_do_quarto" class="form-control" value="{{ $quarto->numero_do_quarto }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="" disabled selected>Selecione um status</option>
                        <option value="disponivel" {{ $quarto->status == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                        <option value="indisponivel" {{ $quarto->status == 'indisponivel' ? 'selected' : '' }}>Indisponível</option>
                        <option value="manutencao" {{ $quarto->status == 'manutencao' ? 'selected' : '' }}>Manutenção</option>
                    </select>
                </div>
                <!-- Adicione os outros campos aqui -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('quartos.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
