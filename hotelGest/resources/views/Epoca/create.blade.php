@extends('adminlte::page')

@section('title', 'Adicionar Época')

@section('content_header')
    <h1>Adicionar Época</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('epoca.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="data_inicio">Data de Início:</label>
                    <input type="date" name="data_inicio" id="data_inicio" class="form-control" required
                           min="<?php echo date('Y-m-d'); ?>" max="9999-12-31">
                </div>
                <div class="form-group">
                    <label for="data_fim">Data de Fim:</label>
                    <input type="date" name="data_fim" id="data_fim" class="form-control" required
                           min="<?php echo date('Y-m-d'); ?>" max="9999-12-31">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
