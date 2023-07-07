@extends('adminlte::page')

@section('title', 'Lista de Preços')

@section('content_header')
    <h1>Lista de Preços</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="{{ route('QuartoEpoca.create') }}" class="btn btn-primary">Adicionar Preço</a>
                <br><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Quarto</th>
                    <th>Época</th>
                    <th>Tipo de Quarto</th>
                    <th>Preço Base por Noite</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quartoEpocas as $quartoEpoca)
                    <tr>
                        <td>{{ $quartoEpoca->id }}</td>
                        <td>{{ $quartoEpoca->quarto->numero_do_quarto }}</td>
                        <td>{{ $quartoEpoca->epoca->nome }}</td>
                        <td>
                            @if($quartoEpoca->tipoDeQuarto)
                                {{ $quartoEpoca->tipoDeQuarto->nome }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $quartoEpoca->preco_base_por_noite }}</td>
                        <td>
                            <a href="{{ route('QuartoEpoca.edit', $quartoEpoca->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('QuartoEpoca.destroy', $quartoEpoca->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
