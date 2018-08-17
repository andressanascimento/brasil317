@extends('layouts.app')

@section('title', 'Produto')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
        <a href="{{ route('produto.create') }}" class="btn btn-primary pull-right">Novo Produto</a>
    </div>

    <table id="tabela_produtos" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Marca</th>
                <th>Fabricante</th>
                <th style="width: 130px">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>
                    <a href="{{route('produto.show', ['produto' => $produto->id])}}"> {{$produto->nome}} </a>
                </td>
                <td>{{ $produto->marca->nome }}</td>
                <td>{{ $produto->fabricante->nome }}</td>
                <td>
                    
                    <form action="{{ route('produto.destroy',['produto' => $produto->id]) }}" method="POST" style="display: inline-block; width: auto;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Deletar</button>
                    </form>
                    <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela_produtos').DataTable();
    } );
</script>
@endsection