<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Disputa;
use App\Http\Requests\DisputaRequest;
use App\Repositories\DisputaRepository;

class DisputaController extends Controller
{

    private $_repository;

    public function __construct()
    {
        $this->_repository = new DisputaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disputas = $this->_repository->all();
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
        $this->_repository->create($request);
        session()->flash('message','Nova disputa criada!');
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
        $disputa = $this->_repository->find($id);
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
        $disputa = $this->_repository->find($id);
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
        $this->_repository->update($request, $id);
        session()->flash('message','Atualizado com sucesso');
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
        $this->_repository->delete($id);
        session()->flash('message','O registro foi excluído');
        return redirect()->route('disputa.index');
    }
}
