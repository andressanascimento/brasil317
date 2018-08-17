@extends('layouts.app')

@section('title', 'Marca')

@section('content')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Marca</h1>
    </div>
    <p><b>Nome:</b> {{$marca->nome}}</p>
@endsection
