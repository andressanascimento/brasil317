@extends('layouts.app')

@section('title', 'Disputa')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nova Disputa</h1>
    </div>
    @include('layouts.errors')

    <form method="post" action="{{route('disputa.store')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="produto"><span style="color:red">*</span>Produto:</label>
            <select name="produto_id" class="form-control">
                <option value="">Selecione</option>
                @foreach ($produtos as $produto_id => $produto)
                    <option value="{{$produto_id}}">{{$produto}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="preco"><span style="color:red">*</span>Preço:</label>
            <input type="text" class="form-control" name="preco" placeholder="Ex: 2.5"/>
        </div>
        <div class="form-group">
            <label for="preco"><span style="color:red">*</span>Preço Concorrente:</label>
            <input type="text" class="form-control" name="preco_concorrente" placeholder="Ex: 2.5" />
        </div>
        <div class="form-group">
            <label for="vitoria">Vitória:</label>
            <select name="vitoria" class="form-control">
                <option value="">Selecione</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status"><span style="color:red">*</span>Status:</label>
            <select name="status" class="form-control">
                <option value="">Selecione</option>
                <option value="aberto">Aberto</option>
                <option value="encerrado">Encerrado</option>
            </select>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection