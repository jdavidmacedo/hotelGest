@extends('layouts.app')

@section('content')
    <h1>Editar Usuário</h1>
    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="password">Nova senha:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirme a nova senha:</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <button type="submit">Atualizar</button>
    </form>
@endsection
