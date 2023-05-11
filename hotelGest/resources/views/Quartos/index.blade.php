@extends('adminlte::page')

@section('title', 'Lista de Quartos')

@section('content_header')
    <div class="container">
        <h2>Lista de Quartos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('quartos.create') }}" class="btn btn-primary">Adicionar Quarto</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Hotel</th>
                <th>Tipo de Quarto</th>
                <th>Número do Quarto</th>
                <th>Status</th>
                <th>Descrição</th>
                <th>Piso</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($quartos as $quarto)
                <tr>
                    <td>{{ $quarto->hotel ? $quarto->hotel->nome : '' }}</td>
                    <td>{{ $quarto->tipo_quartos ? $quarto->tipo_quartos->nome : '' }}</td>
                    <td>{{ $quarto->numero_do_quarto }}</td>
                    <td>{{ $quarto->status }}</td>
                    <td>{{ $quarto->descricao }}</td>
                    <td>{{ $quarto->piso }}</td>
                    <td>
                        <a href="{{ route('quartos.edit', $quarto->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('quartos.destroy', $quarto->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este quarto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
