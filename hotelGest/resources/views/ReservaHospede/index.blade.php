@extends('adminlte::page')

@section('title', 'Listagem de Hóspedes')

@section('content_header')
    <h1>Listagem de Hóspedes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('ReservaHospede.create') }}" class="btn btn-primary mb-3">Adicionar Hóspede</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Reserva</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>País</th>
                    <th>Data de Nascimento</th>
                    <th>NIF</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservaHospedes as $reservaHospede)
                    <tr>
                        <td>{{ $reservaHospede->id }}</td>
                        <td>{{ $reservaHospede->cliente->nome }} {{ $reservaHospede->cliente->sobrenome }}</td>
                        <td>{{ $reservaHospede->reserva->id }}</td>
                        <td>{{ $reservaHospede->nome }}</td>
                        <td>{{ $reservaHospede->sobrenome }}</td>
                        <td>{{ $reservaHospede->email }}</td>
                        <td>{{ $reservaHospede->telefone }}</td>
                        <td>{{ $reservaHospede->endereco }}</td>
                        <td>{{ $reservaHospede->pais }}</td>
                        <td>{{ $reservaHospede->data_nascimento }}</td>
                        <td>{{ $reservaHospede->NIF }}</td>
                        <td>
                            <a href="{{ route('ReservaHospede.edit', $reservaHospede) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('ReservaHospede.destroy', $reservaHospede) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
