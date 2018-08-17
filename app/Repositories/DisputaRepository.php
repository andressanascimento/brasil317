<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Disputa;

class DisputaRepository {

    public function all()
    {
        return Disputa::all();
    }

    public function find($id)
    {
        return Disputa::find($id);
    }

    public function create($request)
    {
        Disputa::create([
            'produto_id' => $request->produto_id,
            'preco' => $request->preco,
            'preco_concorrente' => $request->preco_concorrente,
            'vitoria' => (!empty($request->vitoria)) ? $request->vitoria : null,
            'status' => $request->status
        ]);
    }

    public function update($request, $id)
    {
        $disputa = Disputa::find($id);
        $disputa->produto_id = $request->produto_id;
        $disputa->preco = $request->preco;
        $disputa->preco_concorrente = $request->preco_concorrente;
        $disputa->vitoria = $request->vitoria;
        $disputa->status = $request->status;
        $disputa->save();

        return $disputa;
    }

    public function delete($id)
    {
        $disputa = Disputa::find($id);
        $disputa->delete();
    }
    
    public function performances()
    {
        $performances = DB::table('disputa')
                        ->join('produto', 'produto.id', '=', 'disputa.produto_id')
                        ->join('marca', 'marca.id', '=', 'produto.marca_id')
                        ->join('fabricante', 'fabricante.id', '=', 'produto.fabricante_id')
                        ->select(
                            DB::raw('count(*) as incidencia, 
                                avg(preco) as preco, 
                                avg(preco_concorrente) as preco_concorrente,
                                CASE WHEN sum(vitoria) is null THEN 0 ELSE sum(vitoria) END as vitoria,
                                ((avg(preco_concorrente)-avg(preco))/avg(preco)*100) as diferenca'
                            ),
                            'produto.id as produto_id',
                            'produto.nome as produto',
                            'marca.nome as marca',
                            'fabricante.nome as fabricante'
                        )
                        ->where('status', 'encerrado')
                        ->groupBy('produto.id')
                        ->groupBy('produto.nome')
                        ->groupBy('marca.nome')
                        ->groupBy('fabricante.nome')
                        ->get();

        return $performances;
    }

    public function performancesPorProduto($produto_id)
    {
        $performances = DB::table('disputa')
                        ->join('produto', 'produto.id', '=', 'disputa.produto_id')
                        ->join('marca', 'marca.id', '=', 'produto.marca_id')
                        ->join('fabricante', 'fabricante.id', '=', 'produto.fabricante_id')
                        ->select(
                            DB::raw("
                                CASE WHEN vitoria is null or vitoria = 0 THEN 'Não' ELSE 'Sim' END as vitoria,
                                ((preco_concorrente-preco)/preco*100) as diferenca"
                            ),
                            'produto.id as produto_id',
                            'produto.nome as produto',
                            'preco',
                            'preco_concorrente',
                            'marca.nome as marca',
                            'fabricante.nome as fabricante',
                            'status'
                        )
                        ->where('produto.id', $produto_id)
                        ->where('status', 'encerrado')
                        ->get();

        return $performances;
    }
}