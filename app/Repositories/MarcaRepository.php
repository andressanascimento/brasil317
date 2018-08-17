<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Marca;

class MarcaRepository {

    public function all()
    {
        return Marca::all();
    }

    public function find($id)
    {
        return Marca::find($id);
    }

    public function create($request)
    {
        Marca::create([
            'nome' => $request->nome
        ]);
    }

    public function update($request, $id)
    {
        $marca = Marca::find($id);
        $marca->nome = $request->nome;
        $marca->save();

        return $marca;
    }

    public function delete($id)
    {
        $marca = Marca::find($id);
        $marca->delete();
    }
}