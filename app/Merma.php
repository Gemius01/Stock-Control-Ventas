<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merma extends Model
{
    protected $table = "mermas";

    protected $fillable = [
        'motivo', 'producto_id', 'cantidad', 
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
