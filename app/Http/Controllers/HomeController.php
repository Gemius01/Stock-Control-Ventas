<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::get()->count();
        $productosCriticos = Producto::where('stock_critico','<=', 'stock')->count();
        return view('index',compact(['ventas', 'productosCriticos' ]));
    }
}
