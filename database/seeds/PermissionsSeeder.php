<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           //Módulo de Usuario
           Permission::create([
        	'name' => 'Listar Usuarios',
        	'slug' => 'usuarios.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
        	'name' => 'Crear Usuario',
        	'slug' => 'usuarios.create',
        	'description' => 'Crear un usuario en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Usuario',
        	'slug' => 'usuarios.store',
        	'description' => 'Guardar un usuario en el sistema',
        ]);

        Permission::create([
        	'name' => 'Ver Usuario',
        	'slug' => 'usuarios.show',
        	'description' => 'Ver un usuario en el sistema',
        ]);

        Permission::create([
        	'name' => 'Editar Usuario',
        	'slug' => 'usuarios.edit',
        	'description' => 'Editar un usuario en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Edición Usuario',
        	'slug' => 'usuarios.update',
        	'description' => 'Guardar la edición de un usuario en el sistema',
        ]);

        Permission::create([
        	'name' => 'Eliminar Usuario',
        	'slug' => 'usuarios.destroy',
        	'description' => 'Eliminar un usuario del sistema',
        ]);

        //Módulo de Productos////////////////////////////////////////////////////
        Permission::create([
        	'name' => 'Listar Productos',
        	'slug' => 'productos.index',
        	'description' => 'Lista y navega todos los productos del sistema',
        ]);

        Permission::create([
        	'name' => 'Crear Producto',
        	'slug' => 'productos.create',
        	'description' => 'Crear un producto en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Producto',
        	'slug' => 'productos.store',
        	'description' => 'Guardar un producto en el sistema',
        ]);

        Permission::create([
        	'name' => 'Ver Producto',
        	'slug' => 'productos.show',
        	'description' => 'Ver un producto en el sistema',
        ]);

        Permission::create([
        	'name' => 'Editar Producto',
        	'slug' => 'productos.edit',
        	'description' => 'Editar un producto en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Edición Producto',
        	'slug' => 'productos.update',
        	'description' => 'Guardar la edición de un producto en el sistema',
        ]);

        Permission::create([
        	'name' => 'Eliminar Producto',
        	'slug' => 'productos.destroy',
        	'description' => 'Eliminar un producto del sistema',
        ]);

        Permission::create([
        	'name' => 'Traer Productos',
        	'slug' => 'productos.todos',
        	'description' => 'traer todos los productos del sistema',
        ]);

        //Módulo de Ventas/////////////////////////////////////////////////

        Permission::create([
        	'name' => 'Listar Ventas',
        	'slug' => 'ventas.index',
        	'description' => 'Listar todas las ventas realizadas en el sistema',
        ]);

        Permission::create([
        	'name' => 'Realizar Venta',
        	'slug' => 'ventas.create',
        	'description' => 'Realizar una venta en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Venta',
        	'slug' => 'ventas.store',
        	'description' => 'Guardar una venta en el sistema',
        ]);

        Permission::create([
        	'name' => 'Ver Venta',
        	'slug' => 'ventas.show',
        	'description' => 'Ver detalle de una venta en el sistema',
        ]);

        //Módulo de Carga //////////////////////////////////////////////////7

        Permission::create([
        	'name' => 'Listar Cargas',
        	'slug' => 'cargas.index',
        	'description' => 'Listar las cargas del sistema',
        ]);

        Permission::create([
        	'name' => 'Registrar Carga',
        	'slug' => 'cargas.create',
        	'description' => 'Registrar una carga en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Carga',
        	'slug' => 'cargas.store',
        	'description' => 'Guardar una carga en el sistema',
        ]);

        Permission::create([
        	'name' => 'Ver detalle Carga',
        	'slug' => 'cargas.show',
        	'description' => 'Ver detalle de una carga en el sistema',
		]);
		
		//Módulo de Categorías de Producto /////////////////////////////////////////

		Permission::create([
        	'name' => 'Listar Categorias',
        	'slug' => 'categorias.index',
        	'description' => 'Lista y navega todos los categorias del sistema',
        ]);

        Permission::create([
        	'name' => 'Crear Categoría',
        	'slug' => 'categorias.create',
        	'description' => 'Crear una categoría en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Categoría',
        	'slug' => 'categorias.store',
        	'description' => 'Guardar una categoría en el sistema',
        ]);

        Permission::create([
        	'name' => 'Ver Categoría',
        	'slug' => 'categorias.show',
        	'description' => 'Ver una categoría en el sistema',
        ]);

        Permission::create([
        	'name' => 'Editar Categoría',
        	'slug' => 'categorias.edit',
        	'description' => 'Editar una categoría en el sistema',
        ]);

        Permission::create([
        	'name' => 'Guardar Edición Categoría',
        	'slug' => 'categorias.update',
        	'description' => 'Guardar la edición de una categoría en el sistema',
        ]);

        Permission::create([
        	'name' => 'Eliminar Categoría',
        	'slug' => 'categorias.destroy',
        	'description' => 'Eliminar una categoría del sistema',
        ]);
    }
}
