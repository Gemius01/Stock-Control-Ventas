<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carga;
use App\Producto;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargas = Carga::orderBy('created_at', 'desc')->get();
        return view ('cargas.index', compact(['cargas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::get();
        return view('cargas.create', compact([ 'productos' ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = $request->input('productos');
        $carga = Carga::create(array("total_productos" => $request->input('total_productos')));
        $arrayToSync = [];
        foreach($productos as $producto)
        {
            $arrayToSync[] = [
                "producto_id" => $producto['id'],
                "cantidad" => $producto['cant']
            ];
            $subidaStock = Producto::find($producto['id']);
            $subidaStock->stock = $subidaStock->stock + $producto['cant'];
            $subidaStock->save();
            
        }
        $carga->productos()->sync($arrayToSync);

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carga $carga)
    {
        //dd($carga->productos());
        return view('cargas.show', compact(['carga']));
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
