@extends('layouts.app')

@section('title', 'Marca')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Marcas</h1>
        <a href="{{ route('marca.create') }}" class="btn btn-primary pull-right">Nova Marca</a>
    </div>

    <table id="tabela_marcas" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th style="width: 130px">Ações</th>
            </tr>
        </thead>
        @foreach ($marcas as $marca)
            <tr>
                <td>
                    <a href="{{route('marca.show', ['marca' => $marca->id])}}"> {{$marca->nome}} </a>
                <td>
                    
                    <form action="{{ route('marca.destroy',['marca' => $marca->id]) }}" method="POST" style="display: inline-block; width: auto;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Deletar</button>
                    </form>
                    <a href="{{ route('marca.edit', ['marca' => $marca->id]) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela_marcas').DataTable();
    } );
</script>
@endsection