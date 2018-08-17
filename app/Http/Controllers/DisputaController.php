<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Disputa;
use App\Http\Requests\DisputaRequest;

class DisputaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disputas = Disputa::all();
        return view('disputa.index', ['disputas' => $disputas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::pluck('nome','id');
        return view('disputa.create',['produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisputaRequest $request)
    {
        Disputa::create([
            'produto_id' => $request->produto_id,
            'preco' => $request->preco,
            'preco_concorrente' => $request->preco_concorrente,
            'vitoria' => (!empty($request->vitoria)) ? $request->vitoria : null,
            'status' => $request->status
        ]);

        return redirect()->action('DisputaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disputa  $disputa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disputa = Disputa::find($id);
        return view('disputa.show', ['disputa' => $disputa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disputa  $disputa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produto::pluck('nome','id');
        $disputa = Disputa::find($id);
        return view('disputa.edit', [
            'disputa' => $disputa, 
            'produtos' => $produtos
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disputa  $disputa
     * @return \Illuminate\Http\Response
     */
    public function update(DisputaRequest $request, $id)
    {
        $disputa = Disputa::find($id);
        $disputa->produto_id = $request->produto_id;
        $disputa->preco = $request->preco;
        $disputa->preco_concorrente = $request->preco_concorrente;
        $disputa->vitoria = $request->vitoria;
        $disputa->status = $request->status;
        $disputa->save();
        return redirect()->route('disputa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disputa  $disputa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disputa = Disputa::find($id);
        $disputa->delete();
        return redirect()->route('disputa.index');
    }
}
