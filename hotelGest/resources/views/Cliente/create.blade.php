@extends('adminlte::page')

@section('title', 'Adicionar Cliente')

@section('content_header')
    <h1>Adicionar Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pais">Pais:</label>
                    <input type="text" name="pais"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
