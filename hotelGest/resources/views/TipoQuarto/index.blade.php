@extends('adminlte::page')

@section('title', 'Tipos de Quarto')

@section('content_header')
    <h1>Tipos de Quarto</h1>
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

            <a href="{{ route('TipoQuarto.create') }}" class="btn btn-primary">Criar Tipo de Quarto</a>


            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Capacidade Máxima</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Tipos as $TipoQuarto)
                    <tr>
                        <td>{{ $TipoQuarto->id }}</td>
                        <td>{{ $TipoQuarto->nome }}</td>
                        <td>{{ $TipoQuarto->descricao }}</td>
                        <td>{{ $TipoQuarto->preco }}</td>
                        <td>{{ $TipoQuarto->capacidade_maxima }}</td>
                        <td>
                            <a href="{{ route('TipoQuarto.edit',$TipoQuarto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('TipoQuarto.destroy', $TipoQuarto->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este tipo de quarto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
