@extends('layouts.app')

@section('title', 'Disputa')

@section('content')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Disputa</h1>
    </div>
    <p><b>Produto:</b> {{$disputa->produto->nome}}</p>
    <p><b>Preço:</b> {{$disputa->preco }}</p>
    <p><b>Preço Concorrente:</b> {{$disputa->preco_concorrente }}</p>
    <p><b>Vitória:</b> {{$disputa->vitoria}}</p>
    <p><b>Status:</b> {{$disputa->status}}</p>
@endsection
