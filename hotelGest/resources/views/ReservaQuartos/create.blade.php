@extends('adminlte::page')

@section('title', 'Adicionar Reserva')

@section('content_header')
    <h1>Adicionar Reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('ReservaQuartos.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_reserva">Reserva:</label>
                    <select name="id_reserva" id="id_reserva" class="form-control" required>
                        <option value="">Selecione uma reserva</option>
                        @foreach($reservas as $reserva)
                            <option value="{{ $reserva->id }}">{{ $reserva->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_quarto">Quartos:</label>
                    <select name="id_quarto[]" id="id_quarto" class="form-control" required multiple>
                        <option value="">Selecione um ou mais quartos</option>
                        @foreach($quartos as $quarto)
                            <option value="{{ $quarto->id }}">{{ $quarto->numero_do_quarto }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('adminlte_js')
    <script>
        $(document).ready(function () {
            $('#id_quarto').select2();
        });
    </script>
@stop
