<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = [
        'nombre', 'precio_costo', 'precio_venta', 'codigo', 'stock', 'stock_critico', 'categoria_id'
    ];

    public function cargas()
    {
        return $this->belongsToMany(Carga::class);
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function merma()
    {
        return $this->hasMany(Merma::class);
    }
}
