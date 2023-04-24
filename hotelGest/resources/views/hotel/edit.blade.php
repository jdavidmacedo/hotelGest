@extends('adminlte::page')

@section('title', 'Adicionar Hotel')

@section('content_header')
    <div class="container">
        <h2>Editar Hotel</h2>

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
                <input type="email" name="email" id="email" class="form-control" value="{{ $hotel->email }}" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="form-control" value="{{ $hotel->endereco }}" required>
            </div>

            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="{{ $hotel->cidade }}" required>
            </div>

            <div class="form-group">
                <label for="pais">País:</label>
                <input type="text" name="pais" id="pais" class="form-control" value="{{ $hotel->pais }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="{{ $hotel->telefone }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
