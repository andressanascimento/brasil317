@extends('layouts.app')

@section('title', 'Produto')

@section('content')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produto</h1>
    </div>
    <p><b>Nome:</b> {{$produto->nome}}</p>
    <p><b>Marca:</b> {{$produto->marca->nome}}</p>
    <p><b>Fabricante:</b> {{$produto->fabricante->nome}}</p>
@endsection
