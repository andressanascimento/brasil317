<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FabricanteRepository;
use App\Models\Fabricante;
use App\Http\Requests\FabricanteRequest;

class FabricanteController extends Controller
{
    private $_repository;

    public function __construct()
    {
        $this->_repository = new FabricanteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = $this->_repository->all();
        return view('fabricante.index', ['fabricantes' => $fabricantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FabricanteRequest $request)
    {
        $this->_repository->create($request);
        return redirect()->action('FabricanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        return view('fabricante.show', ['fabricante' => $fabricante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        return view('fabricante.edit', ['fabricante' => $fabricante]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FabricanteRequest $request, $id)
    {
        $this->_repository->update($request, $id);
        return redirect()->route('fabricante.index');
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
        return redirect()->route('fabricante.index');
    }
}
