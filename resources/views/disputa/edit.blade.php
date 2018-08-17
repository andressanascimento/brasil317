@extends('layouts.app')

@section('title', 'Disputa')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Disputa</h1>
    </div>
    @include('layouts.errors')

    <form method="post" action="{{route('disputa.update',['id' => $disputa->id])}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="produto"><span style="color:red">*</span>Produto:</label>
            <select name="produto_id" class="form-control">
                <option value="">Selecione</option>
                @foreach ($produtos as $produto_id => $produto)
                    <option value="{{$produto_id}}"
                        @if($produto_id == $disputa->produto->id)
                            selected  
                        @endif
                    >
                        {{$produto}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="preco"><span style="color:red">*</span>Preço:</label>
            <input type="text" class="form-control" name="preco" value="{{ $disputa->preco }}" />
        </div>
        <div class="form-group">
            <label for="preco"><span style="color:red">*</span>Preço Concorrente:</label>
            <input type="text" class="form-control" name="preco_concorrente" value="{{ $disputa->preco_concorrente }}" />
        </div>
        <div class="form-group">
            <label for="vitoria">Vitória:</label>
            <select name="vitoria" class="form-control">
                <option value=""
                @if(is_null($disputa->vitoria))
                    selected  
                @endif
                >
                    Selecione
                </option>
                <option value="1"
                    @if($disputa->vitoria == "1")
                        selected  
                    @endif
                >
                    Sim
                </option>
                <option value="0"
                    @if($disputa->vitoria == "0")
                        selected  
                    @endif
                >
                    Não
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="status"><span style="color:red">*</span>Status:</label>
            <select name="status" class="form-control">
                <option value="">Selecione</option>
                <option value="aberto"
                @if($disputa->status == "aberto")
                        selected  
                @endif
                >Aberto</option>
                <option value="encerrado"
                     @if($disputa->status == "encerrado")
                        selected  
                    @endif
                >Encerrado</option>
            </select>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection