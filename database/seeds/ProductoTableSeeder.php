<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::Create([
            "nombre" => "Producto 1",
            "precio_costo" => 100,
            "categoria_id" => 1,
            "codigo" => 12,
            "stock_critico" => 10,
            "precio_venta" => 1000,
        ]);
    }
}
