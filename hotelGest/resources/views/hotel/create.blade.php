@extends('adminlte::page')

@section('title', 'Adicionar Hotel')

@section('content_header')
    <h1>Adicionar Hotel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('hotel.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" name="codigo_postal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pais">Pais:</label>
                    <input type="text" name="pais" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="estrelas">Estrelas:</label>
                    <select name="estrelas" class="form-control" required>
                        <option value="1">1 Estrela</option>
                        <option value="2">2 Estrelas</option>
                        <option value="3">3 Estrelas</option>
                        <option value="4">4 Estrelas</option>
                        <option value="5">5 Estrelas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
