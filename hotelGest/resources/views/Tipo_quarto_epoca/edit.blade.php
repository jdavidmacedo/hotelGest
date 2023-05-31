@extends('adminlte::page')

@section('title', 'Editar Tipo_epocas')

@section('content_header')
    <h1>Editar Tipo_epocas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Tipo_quarto_epoca.update', $Tipo_epocas) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_quarto">Quarto:</label>
                    <select name="id_quarto" id="id_quarto" class="form-control" required>
                        <option value="">Selecione um quarto</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}" {{ $Tipo_epocas->quarto->id == $quarto->id ? 'selected' : '' }}>{{ $quarto->numero_do_quarto }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_tipo_quartos">Tipo de quarto:</label>
                    <select name="id_tipo_quartos" id="id_tipo_quartos" class="form-control" required>
                        <option value="" disabled>Selecione um tipo de quarto</option>
                        @foreach($Tipos as $TipoDeQuarto)
                            <option value="{{ $TipoDeQuarto->id }}" {{ $Tipo_epocas->tipo_quartos->id == $TipoDeQuarto->id ? 'selected' : '' }}>{{ $TipoDeQuarto->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_checkin">Data de Check-in:</label>
                    <input type="date" name="data_checkin" id="data_checkin" class="form-control" value="{{ $Tipo_epocas->data_checkin }}" required>
                </div>
                <div class="form-group">
                    <label for="data_checkout">Data de Check-out:</label>
                    <input type="date" name="data_checkout" id="data_checkout" class="form-control" value="{{ $Tipo_epocas->data_checkout }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('Tipo_quarto_epoca.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
