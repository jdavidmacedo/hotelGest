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

        <a href="{{ route('hotel.store') }}" class="btn btn-primary">Adicionar Hotel</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hoteis as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->nome }}</td>
                    <td>{{ $hotel->email }}</td>
                    <td>
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('hotel.destroy', $hotel->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este hotel?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
