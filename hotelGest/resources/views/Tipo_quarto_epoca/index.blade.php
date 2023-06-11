@extends('adminlte::page')

@section('title', 'Lista de Tipo_epocas')

@section('content_header')
    <h1>Lista de Tipo_epocas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('Tipo_quarto_epoca.create') }}" class="btn btn-primary mb-3">Adicionar Tipo_epocas</a>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Quarto</th>
                    <th>Tipo de Quarto</th>
                    <th>Data de Check-in</th>
                    <th>Data de Check-out</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Tipo_epocas as $Tipo_epoca)
                    <tr>
                        <td>{{ $Tipo_epoca->id }}</td>
                        <td>{{ $Tipo_epoca->quarto->numero_do_quarto }}</td>
                        <td>{{ $Tipo_epoca->tipo_quartos->nome }}</td>
                        <td>{{ $Tipo_epoca->data_checkin }}</td>
                        <td>{{ $Tipo_epoca->data_checkout }}</td>
                        <td>
                            <a href="{{ route('Tipo_quarto_epoca.edit', $Tipo_epoca) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('Tipo_quarto_epoca.destroy', $Tipo_epoca) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
