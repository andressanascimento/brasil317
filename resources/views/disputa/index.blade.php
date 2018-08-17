@extends('layouts.app')

@section('title', 'Disputa')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Disputas</h1>
        <a href="{{ route('disputa.create') }}" class="btn btn-primary pull-right">Nova Disputa</a>
    </div>

    <table id="tabela_disputas" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Disputa</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Preço Concorrente</th>
                <th>Vitória</th>
                <th>Status</th>
                <th style="width: 130px">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($disputas as $disputa)
            <tr>
                <td>
                    <a href="{{route('disputa.show', ['disputa' => $disputa->id])}}"> {{'D'.$disputa->produto->id.$disputa->id}} </a>
                </td>
                <td>{{ $disputa->produto->nome }}</td>
                <td>{{ 'R$'.number_format((float)$disputa->preco, 2, ',', '.') }}</td>
                <td>{{ 'R$'.number_format((float)$disputa->preco_concorrente,2, ',', '.') }}</td>
                <td>
                    @if($disputa->vitoria)
                        {{ "Sim" }}
                    @elseif(!is_null($disputa->vitoria))
                        {{ "Não" }}
                    @else
                        {{ $disputa->vitoria }}
                    @endif
                </td>
                <td>{{ ucfirst($disputa->status) }}</td>
                <td>
                    
                    <form action="{{ route('disputa.destroy',['disputa' => $disputa->id]) }}" method="POST" style="display: inline-block; width: auto;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Deletar</button>
                    </form>
                    <a href="{{ route('disputa.edit', ['disputa' => $disputa->id]) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela_disputas').DataTable();
    } );
</script>
@endsection