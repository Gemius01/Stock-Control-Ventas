<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Cuadratura;
use App\Venta;

class CuadraturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuadraturas = Cuadratura::get();
        return view('cuadraturas.index',compact(['cuadraturas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuadraturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ventas = $request->input('ventas');
        $total_coste = 0;
        $total_ganancia = 0;
        $arrayToSync = [];
        foreach($ventas as $venta)
        {
            $ventaFind = Venta::find($venta['id']);

            $arrayToSync[] = [
                "venta_id" => $venta['id'],
                
            ];
            
            foreach($ventaFind->productos()->get() as $producto)
            {
                $total_ganancia = $total_ganancia + ($producto->pivot->cantidad * $producto->pivot->valor_unitario);
                $total_coste = $total_coste + ($producto->pivot->cantidad * $producto->precio_costo);
            }
        }
        $cuadratura = Cuadratura::create([
           "num_ventas" => count($ventas),
           "total_ganancia" => $total_ganancia,
           "total_coste" => $total_coste,
        ]);
        $cuadratura->ventas()->sync($arrayToSync);

        return $total_coste;
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

    public function buscar($fechaInicio, $fechaTermino)
    {
        $fechaIn = Carbon::parse($fechaInicio.'00:00:00');
        $fechaTer = Carbon::parse($fechaTermino.'23:59:59');
        $ventas = Venta::whereBetween('created_at', [$fechaIn,$fechaTer])->get();
        return $ventas;
        
    }

    public function buscarVenta($idVenta)
    {
        $venta = Venta::find($idVenta);
        
        return $venta->productos()->get();

    }
}
