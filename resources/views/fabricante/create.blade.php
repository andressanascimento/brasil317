@extends('layouts.app')

@section('title', 'Fabricante')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Novo Fabricante</h1>
    </div>
    @include('layouts.errors')

    <form method="post" action="{{route('fabricante.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome"><span style="color:red">*</span>Nome:</label>
            <input type="text" class="form-control" name="nome" />
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection