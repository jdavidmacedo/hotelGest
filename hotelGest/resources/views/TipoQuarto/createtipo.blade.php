@extends('adminlte::page')

@section('title', 'Adicionar tipo de quarto')

@section('content_header')
    <h1>Adicionar Hotel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/TipoQuarto/createtipo" method="post">
                @csrf
                <div class="form-group">
                    <label for="hotel">Hotel:</label>
                    <input type="search" name="idhotel"  class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descricção:</label>
                    <input type="text" name="descricao"  class="form-control" required>
                </div>
                <!-- Adicione os outros campos aqui -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
@stop

