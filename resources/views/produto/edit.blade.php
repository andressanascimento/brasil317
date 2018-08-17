@extends('layouts.app')

@section('title', 'Produto')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Produto</h1>
    </div>
    @include('layouts.errors')

    <form method="post" action="{{route('produto.update',['id' => $produto->id])}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="nome"><span style="color:red">*</span>Nome:</label>
            <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}"/>
        </div>
        <div class="form-group">
            <label for="marca"><span style="color:red">*</span>Marca:</label>
            <select name="marca" class="form-control">
                <option value="">Selecione</option>
                @foreach ($marcas as $marca_id => $marca)
                    <option value="{{$marca_id}}" 
                        @if($marca_id == $produto->marca->id)
                            selected  
                        @endif>
                        {{$marca}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fabricante"><span style="color:red">*</span>Fabricante:</label>
            <select name="fabricante" class="form-control">
                <option value="">Selecione</option>
                @foreach ($fabricantes as $fabricante_id => $fabricante)
                    <option value="{{$fabricante_id}}"
                        @if($fabricante_id == $produto->fabricante->id)
                            selected  
                        @endif
                    >
                        {{$fabricante}}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection