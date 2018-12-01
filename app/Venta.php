<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";

    protected $fillable = [ 'valor_neto', 'created_at', 'updated_at'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('valor_unitario', 'valor_neto', 'cantidad');
    }

    public function cuadraturas()
    {
        return $this->belongsToMany(Cuadratura::class);
    }
}
