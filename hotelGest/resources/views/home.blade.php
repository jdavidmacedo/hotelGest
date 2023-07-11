@extends('adminlte::page')

@section('Menu', 'Dashboard')

@section('content_header')
    <h1>Menu Principal</h1>
@stop

@section('content')
    <p>Bem vindo ao HotelGest.    </p>
    <p>O HotelGest é uma aplicação WEB criada por alunos do Instituto Politécnico de Viana do Castelo do curso de Engenharia de Computação Gráfica e Multimédia.
    <br>Este projeto foi desenvolvido com o intuito de ajudar instituições hoteleiras na gestão dos seus recursos e ambientes.    </p>
    <p>Access Token: <span class="access-token" style="color: blue;">{{ session('access_token') }}</span></p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
