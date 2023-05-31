@extends('adminlte::page')

@section('title', 'Adicionar')

@section('content_header')
    <h1>Adicionar Fatura</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Fatura.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data" class="form-control" required
                           min="<?php echo date('Y-m-d'); ?>" max="9999-12-31">
                </div>
                <div class="form-group">
                    <label for="preco">Valor Total:</label>
                    <div class="input-group">
                        <input type="number" name="valor_total" id="preco" step="0.01" min="0" max="9999999999.99" class="form-control" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="pendente">Pendente</option>
                        <option value="pago">Pago</option>
                        <option value="atrasado">Atrasado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="tipo_pagamento">Tipo de Pagamento:</label>
                    <select name="tipo_pagamento" id="tipo_pagamento" class="form-control" required>
                        <option value="dinheiro">Dinheiro</option>
                        <option value="cartao_debito">Cartão de Débito</option>
                        <option value="cartao_credito">Cartão de Crédito</option>
                        <option value="transferencia_bancaria">Transferência Bancária</option>
                        <option value="multibanco">Multibanco</option>
                        <option value="mb_way">MB Way</option>
                        <option value="cheque">Cheque</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
