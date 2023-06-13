@extends('adminlte::page')

@section('title', 'Editar Hotel')

@section('content_header')
    <h1>Editar Hotel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('hotel.update', $hotel->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $hotel->nome }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $hotel->email }}" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" class="form-control" value="{{ $hotel->telefone }}" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" value="{{ $hotel->endereco }}" required>
                </div>
                <div class="form-group">
                    <label for="pais">Pais:</label>
                    <input type="text" name="pais" class="form-control" value="{{ $hotel->pais }}" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" value="{{ $hotel->cidade }}" required>
                </div>
                <div class="form-group">
                    <label for="estrelas">Estrelas:</label>
                    <select name="estrelas" class="form-control" required>
                        <option value="1" {{ $hotel->estrelas == 1 ? 'selected' : '' }}>1 Estrela</option>
                        <option value="2" {{ $hotel->estrelas == 2 ? 'selected' : '' }}>2 Estrelas</option>
                        <option value="3" {{ $hotel->estrelas == 3 ? 'selected' : '' }}>3 Estrelas</option>
                        <option value="4" {{ $hotel->estrelas == 4 ? 'selected' : '' }}>4 Estrelas</option>
                        <option value="5" {{ $hotel->estrelas == 5 ? 'selected' : '' }}>5 Estrelas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" class="form-control" required>{{ $hotel->descricao }}</textarea>
                </div>
                <div class="form-group">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" name="codigo_postal" class="form-control" value="{{ $hotel->codigo_postal }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('hotel.index') }}" class="btn btn-default">Cancelar</a>
                </div>
        </form>
    </div>
@endsection
