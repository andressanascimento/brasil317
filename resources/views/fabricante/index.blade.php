@extends('layouts.app')

@section('title', 'Fabricante')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Fabricantes</h1>
        <a href="{{ route('fabricante.create') }}" class="btn btn-primary pull-right">Novo Fabricante</a>
    </div>

    <table id="tabela_fabricantes" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th style="width: 130px">Ações</th>
            </tr>
        </thead>
        @foreach ($fabricantes as $fabricante)
            <tr>
                <td>
                    <a href="{{route('fabricante.show', ['fabricante' => $fabricante->id])}}"> {{$fabricante->nome}} </a>
                <td>
                    
                    <form action="{{ route('fabricante.destroy',['fabricante' => $fabricante->id]) }}" method="POST" style="display: inline-block; width: auto;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Deletar</button>
                    </form>
                    <a href="{{ route('fabricante.edit', ['fabricante' => $fabricante->id]) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela_fabricantes').DataTable();
    } );
</script>
@endsection