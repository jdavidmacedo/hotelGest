@extends('layouts.app')

@section('content')
    <h1>Detalhes do Usuário</h1>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
@endsection
