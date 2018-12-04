<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Merma;
use App\Producto;
use App\Http\Requests\MermaStoreRequest;

class MermaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mermas = Merma::get();
        return view('mermas.index', compact(['mermas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::select(
            DB::raw("CONCAT('[',codigo,'] ',nombre) AS nombre"),'id')
            ->pluck('nombre','id');
        return view('mermas.create', compact(['productos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MermaStoreRequest $request)
    {
        
        $merma = Merma::create($request->except('_token'));
        $producto = Producto::find($request->input('producto_id'));
        $producto->stock = $producto->stock - $request->input('cantidad');
        $producto->save();

        return redirect()->route('mermas.index')
            ->with('info', 'Merma registrada con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merma  = Merma::find($id);
        return view('mermas.show', compact(['merma']));
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
