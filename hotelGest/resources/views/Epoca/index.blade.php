@extends('adminlte::page')

@section('title', 'Épocas')

@section('content_header')
    <h1>Épocas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('epoca.create') }}" class="btn btn-primary mb-3">Adicionar Época</a>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($epocas as $epoca)
                    <tr>
                        <td>{{ $epoca->id }}</td>
                        <td>{{ $epoca->nome }}</td>
                        <td>{{ $epoca->data_inicio }}</td>
                        <td>{{ $epoca->data_fim }}</td>
                        <td>
                            <a href="{{ route('epoca.edit', $epoca) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('epoca.destroy', $epoca) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este quarto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
