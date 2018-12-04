<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where('activo', '=', true)->get();
        return view('productos.index', compact(['productos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::pluck('nombre','id');

        return view('productos.create', compact([ 'categorias' ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoStoreRequest $request)
    {

        $producto = Producto::create($request->all());
        return redirect()->route('productos.index')
            ->with('info', 'Producto Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::pluck('nombre','id');
        
        return view('productos.edit', compact('producto', 'categorias'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        
        $producto->update($request->all());
        return redirect()->route('productos.index')
            ->with('info', 'Producto Agregado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return back()->with('info', 'Eliminado Correctamente');
    }

    public function traerProductos() 
    {
        $productos = Producto::all();

        return $productos;
    }

    public function baja($producto)
    {
        $producto = Producto::find($producto);
        $producto->activo = 0;
        $producto->save();

        return back()->with('info', 'Se ha dado de baja el producto');
    }

    public function quitarBaja($producto)
    {
        $producto = Producto::find($producto);
        $producto->activo = 1;
        $producto->save();

        return back()->with('info', 'Se ha devuelto el producto');
    }

    public function listaBajas()
    {
        $productos = Producto::where('activo', '=', false)->get();
        return view('productos.bajas', compact(['productos']));
    }

    public function stockProducto($producto) 
    {
        $producto = Producto::find($producto);
        

        return $producto->stock;
    }
}
