<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuadratura extends Model
{
    protected $table = "cuadraturas";

    protected $fillable = [
        'num_ventas', 'total_coste', 'total_ganancia', 
    ];

    public function ventas()
    {
        return $this->belongsToMany(Venta::class);
    }
}
