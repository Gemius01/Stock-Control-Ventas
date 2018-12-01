<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Producto;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::get();
        return view('ventas.index', compact(['ventas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::get();
        return view('ventas.create', compact(['productos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->input('total_venta');
        $productos = $request->input('productos');
        $venta = Venta::create([
            "valor_neto" => $request->input('total_venta')
            ]);
        $arrayToSync = [];
        foreach($productos as $producto)
        {
            $arrayToSync[] = [
                "producto_id" => $producto['id'],
                "cantidad" => $producto['cant'],
                "valor_unitario" => $producto['valor'],
                "valor_neto" => 0,
            ];
            $bajadaStock = Producto::find($producto['id']);
            $bajadaStock->stock = $bajadaStock->stock - $producto['cant'];
            $bajadaStock->save();
                
        }
        
        $venta->productos()->sync($arrayToSync);
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id)->first();
        return view('ventas.show', compact(['venta']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
