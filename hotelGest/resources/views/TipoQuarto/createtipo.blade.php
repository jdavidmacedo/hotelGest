@extends('adminlte::page')

@section('title', 'Adicionar Hotel')
@extends('adminlte::page')


@section('content_header')
    <div class="container">
        <h2>Adicionar Tipo de Quarto</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('TipoQuarto.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_hotel">Hotel:</label>
                <select name="id_hotel" id="id_hotel" class="form-control" required>
                    <option value="">Selecione um hotel</option>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->nome }}</option>
                    @endforeach
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
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
