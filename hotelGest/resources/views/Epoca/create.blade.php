@extends('adminlte::page')

@section('title', 'Adicionar Época')

@section('content_header')
    <h1>Adicionar Época</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('epoca.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="data_inicio">Data de Início:</label>
                    <?php
                    setlocale(LC_TIME, 'pt_BR.utf8');
                    $dataInicio = date('Y-m-d');
                    ?>
                    <input type="date" name="data_inicio" id="data_inicio" class="form-control" required
                           min="<?php echo $dataInicio; ?>" max="9999-12-31">

                </div>
                <div class="form-group">
                    <label for="data_fim">Data de Fim:</label>
                    <?php
                    $dataFim = date('Y-m-d');
                    ?>
                    <input type="date" name="data_fim" id="data_fim" class="form-control" required
                           min="<?php echo $dataFim; ?>" max="9999-12-31">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.getElementById("data_inicio").addEventListener("change", function() {
            // Quando o valor do campo "data_inicio" é alterado, a seguinte função é executada

            document.getElementById("data_fim").min = this.value;
            // Atualiza o valor mínimo permitido no campo "data_fim" com o valor selecionado no campo "data_inicio"
        });

    </script>
@stop
