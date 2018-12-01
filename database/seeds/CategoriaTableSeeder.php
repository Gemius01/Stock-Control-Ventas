<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Categoria::create([
            "nombre" => "Categoría 1"
        ]);

        Categoria::create([
            "nombre" => "Categoría 2"
        ]);
        Categoria::create([
            "nombre" => "Categoría 3"
        ]);
    }
}
