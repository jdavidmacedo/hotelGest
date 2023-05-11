@extends('adminlte::page')

@section('title', 'Adicionar Hotel')

@section('content_header')
    <div class="container">
        <h2>Listar Hotéis</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('hotel.create') }}" class="btn btn-primary">Adicionar Hotel</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Codigo Postal</th>
                <th>País</th>
                <th>Cidade</th>
                <th>Estrelas</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hotel as $hotel)
                <tr>
                    <td>{{ $hotel->nome }}</td>
                    <td>{{ $hotel->email }}</td>
                    <td>{{ $hotel->telefone }}</td>
                    <td>{{ $hotel->endereco }}</td>
                    <td>{{ $hotel->codigo_postal }}</td>
                    <td>{{ $hotel->pais }}</td>
                    <td>{{ $hotel->cidade }}</td>
                    <td>{{ $hotel->estrelas }}</td>
                    <td>
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('hotel.destroy', $hotel->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este hotel?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
