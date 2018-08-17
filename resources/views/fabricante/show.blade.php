@extends('layouts.app')

@section('title', 'Fabricante')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Fabricante</h1>
    </div>
    <p><b>Nome:</b> {{$fabricante->nome}}</p>
@endsection
