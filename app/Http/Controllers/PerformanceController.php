<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disputa;
use App\Repositories\DisputaRepository;

class PerformanceController extends Controller
{
    protected $_repository;

    public function __construct ()
    {
        $this->_repository = new DisputaRepository();
    }

    public function index()
    {
        
        $performances = $this->_repository->performances();
        return view('performance.index', ['performances' => $performances]);
    }

    public function performancePorProduto($produto_id)
    {
        $repository = new DisputaRepository();
        $performances = $this->_repository->performances();
        return view('performance.produto', ['performances' => $performances]);
    }

}