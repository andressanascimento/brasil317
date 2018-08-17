<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProdutoRepository;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\Fabricante;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    private $_repository;

    public function __construct()
    {
        $this->_repository = new ProdutoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $produtos = $this->_repository->all();
        return view('produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabricantes = Fabricante::pluck('nome','id');
        $marcas = Marca::pluck('nome','id');
        return view('produto.create',['fabricantes' => $fabricantes, 'marcas' => $marcas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $this->_repository->create($request);

        return redirect()->action('ProdutoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fabricantes = Fabricante::pluck('nome','id');
        $marcas = Marca::pluck('nome','id');
        return view(
            'produto.edit', 
            [
                'produto' => $produto, 
                'fabricantes' => $fabricantes, 
                'marcas' => $marcas
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $this->_repository->update($request, $id);
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_repository->delete($id);
        return redirect()->route('produto.index');
    }
}
