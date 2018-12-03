<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class InsumosCriticosController extends Controller
{
    public function index()
    {
        $productos = Producto::where('stock_critico','<=', 'stock')->get();
        return view('criticos.index',compact(['productos']));
    }
}
