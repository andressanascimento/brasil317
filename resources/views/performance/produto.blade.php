@extends('layouts.app')

@section('title', 'Performance')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Performance por Produto</h1>
    </div>

    <table id="tabela_performance_produto" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Fabricante</th>
                <th>Marca</th>
                <th>Vitória</th>
                <th>Preço</th>
                <th>Preço Concorrência</th>
                <th>Diferença</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($performances as $performance)
            <tr>
                <td>{{ $performance->produto }}</td>
                <td>{{ $performance->fabricante }}</td>
                <td>{{ $performance->marca }}</td>
                <td>{{ $performance->vitoria }}</td>
                <td>{{ 'R$'.number_format((float)$performance->preco, 2, ',', '.') }}</td>
                <td>{{ 'R$'.number_format((float)$performance->preco_concorrente, 2, ',', '.') }}</td>
                <td>
                    @if($performance->diferenca < -20)
                    <span class="badge badge-danger">
                        <strong>{{ number_format((float)$performance->diferenca,2) }}%</strong>
                    </span>
                    
                    @elseif($performance->diferenca < 0 && $performance->diferenca > -20)
                    <span class="badge badge-warning">
                        <strong>{{ number_format((float)$performance->diferenca,2) }}%</strong>
                    </span>
                    @else
                    <span class="badge badge-success">
                        <strong>{{ number_format((float)$performance->diferenca,2) }}%</strong>
                    </span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela_performance_produto').DataTable();
    } );
</script>
@endsection