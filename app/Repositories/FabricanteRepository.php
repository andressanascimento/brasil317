<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Fabricante;

class FabricanteRepository {

    public function all()
    {
        return Fabricante::all();
    }

    public function find($id)
    {
        return Fabricante::find($id);
    }

    public function create($request)
    {
        Fabricante::create([
            'nome' => $request->nome
        ]);
    }

    public function update($request, $id)
    {
        $fabricante = Fabricante::find($id);
        $fabricante->nome = $request->nome;
        $fabricante->save();

        return $fabricante;
    }

    public function delete($id)
    {
        $fabricante = Fabricante::find($id);
        $fabricante->delete();
    }
}