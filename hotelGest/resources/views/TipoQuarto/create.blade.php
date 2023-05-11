@extends('adminlte::page')

@section('title', 'Adicionar Tipo de Quarto')

@section('content_header')
    <div class="container">
        <h2>Adicionar Tipo de Quarto</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('TipoQuarto.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="capacidade_maxima">Capacidade Máxima:</label>
                <input type="number" name="capacidade_maxima" id="capacidade_maxima" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="" class="btn btn-default">Cancelar</a>
        </form>
    </div>
@endsection
