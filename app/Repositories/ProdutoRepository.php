<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class ProdutoRepository {

    public function all()
    {
        return Produto::all();
    }

    public function find($id)
    {
        return Produto::find($id);
    }

    public function create($request)
    {
        Produto::create([
            'nome' => $request->nome,
            'marca_id' => $request->marca,
            'fabricante_id' => $request->fabricante
        ]);
    }

    public function update($request, $id)
    {
        $produto = Produto::find($id);
        $produto->nome = $request->nome;
        $produto->marca_id = $request->marca;
        $produto->fabricante_id = $request->fabricante;
        $produto->save();

        return $produto;
    }

    public function delete($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
    }
}