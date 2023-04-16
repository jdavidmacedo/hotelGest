@extends('adminlte::page')

@section('title', 'Adicionar Hotel')

@section('content_header')
    <h1>Adicionar Hotel</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/TipoQuarto/createtipo" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_hotel">Hotel:</label>
                    <select name="id_hotel" id="id_hotel" class="form-control" required>
                        <option value="">Selecione um hotel</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
