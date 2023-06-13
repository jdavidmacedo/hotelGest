@extends('adminlte::page')

@section('title', 'Lista de Reservas de Quartos')

@section('content_header')
    <h1>Lista de Reservas de Quartos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                    <a href="{{ route('ReservaQuartos.create') }}" class="btn btn-primary">Criar Reserva</a>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Reserva</th>
                    <th>Quarto</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservaQuartos as $reservaQuarto)
                    <tr>
                        <td>{{ $reservaQuarto->id }}</td>
                        <td>{{ $reservaQuarto->reserva->id }}</td>
                        <td>{{ $reservaQuarto->quarto->numero_do_quarto }}</td>
                        <td>
                            <a href="{{ route('ReservaQuartos.edit', $reservaQuarto->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('ReservaQuartos.destroy', $reservaQuarto->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este quarto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
