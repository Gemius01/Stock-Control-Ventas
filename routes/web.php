<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware(['auth'])->group(function(){

    Route::get('/home', 'HomeController@index')->name('index');

    //Rutas Módulo usuarios

    Route::get('/usuarios', 'UserController@index')->name('usuarios.index')
        ->middleware('permission:usuarios.index');

    Route::get('/usuarios/create', 'UserController@create')->name('usuarios.create')
        ->middleware('permission:usuarios.create');

    Route::post('/usuarios/store', 'UserController@store')->name('usuarios.store')
        ->middleware('permission:usuarios.store');

    Route::get('/usuarios/edit/{usuario}', 'UserController@edit')->name('usuarios.edit')
        ->middleware('permission:usuarios.edit');

    Route::put('/usuarios/update/{usuario}', 'UserController@update')->name('usuarios.update')
        ->middleware('permission:usuarios.update');

    Route::get('/usuarios/show/{usuario}', 'UserController@show')->name('usuarios.show')
        ->middleware('permission:usuarios.show');

    Route::delete('/usuarios/destroy/{usuario}', 'UserController@destroy')->name('usuarios.destroy')
        ->middleware('permission:usuarios.destroy');

    //Rutas Módulo Productos

    Route::get('/productos', 'ProductoController@index')->name('productos.index')
        ->middleware('permission:productos.index');

    Route::get('/productos/create', 'ProductoController@create')->name('productos.create')
        ->middleware('permission:productos.create');

    Route::post('/productos/store', 'ProductoController@store')->name('productos.store')
        ->middleware('permission:productos.store');

    Route::get('/productos/edit/{producto}', 'ProductoController@edit')->name('producto.edit')
        ->middleware('permission:productos.edit');
    
    Route::get('/productos/show/{producto}', 'ProductoController@show')->name('producto.show')
        ->middleware('permission:productos.show');

    Route::put('/productos/update/{producto}', 'ProductoController@update')->name('producto.update')
        ->middleware('permission:productos.update');

    Route::delete('/productos/destroy/{producto}', 'ProductoController@destroy')->name('producto.destroy')
        ->middleware('permission:productos.destroy');
    
    Route::get('/productos/todos', 'ProductoController@traerProductos')->name('productos.todos')
        ->middleware('permission:productos.todos');

    //Rutas Módulo Informes

    Route::get('/informes', 'ReporteController@index')->name('informes.index');

    Route::get('/informes/cuadrar', 'ReporteController@cuadrarCaja')->name('informes.cuadrar');

    //Rutas Módulo de Cuadratura de Caja
    Route::get('/cuadraturas', 'CuadraturaController@index')->name('cuadraturas.index');

    Route::get('/cuadraturas/create', 'CuadraturaController@create')->name('cuadraturas.create');

    Route::get('/cuadraturas/buscar/{fechainicio}/{fechatermino}', 'CuadraturaController@buscar')->name('cuadraturas.buscar');

    Route::get('/cuadraturas/buscarventa/{venta}', 'CuadraturaController@buscarVenta')->name('cuadraturas.buscarVenta');
    
    Route::post('/cuadraturas/store', 'CuadraturaController@store')->name('cuadraturas.store');

    Route::get('/cuadraturas/show/{cuadratura}', 'CuadraturaController@show')->name('cuadraturas.show');
    //Rutas Módulo Ventas

    Route::get('/ventas', 'VentaController@index')->name('ventas.index')
        ->middleware('permission:ventas.index');

    Route::get('/ventas/create', 'VentaController@create')->name('ventas.create')
        ->middleware('permission:ventas.create');

    Route::post('/ventas/store', 'VentaController@store')->name('ventas.store')
        ->middleware('permission:ventas.store');

    Route::get('/ventas/show/{venta}', 'VentaController@show')->name('ventas.show')
        ->middleware('permission:ventas.show');

    //Rutas Módulo de Carga

    Route::get('/cargas', 'CargaController@index')->name('cargas.index')
        ->middleware('permission:cargas.index');

    Route::get('/cargas/create', 'CargaController@create')->name('cargas.create')
        ->middleware('permission:cargas.create');

    Route::post('/cargas/store', 'CargaController@store')->name('cargas.store')
        ->middleware('permission:cargas.store');

    Route::get('/cargas/show/{carga}', 'CargaController@show')->name('cargas.show')
        ->middleware('permission:cargas.show');

    //Rutas Módulo de Categorias de Producto
    Route::get('/categorias', 'CategoriaController@index')->name('categorias.index')
        ->middleware('permission:categorias.index');

    Route::get('/categorias/create', 'CategoriaController@create')->name('categorias.create')
        ->middleware('permission:categorias.create');

    Route::post('/categorias/store', 'CategoriaController@store')->name('categorias.store')
        ->middleware('permission:categorias.store');

    Route::get('/categorias/edit/{categoria}', 'CategoriaController@edit')->name('categoria.edit')
        ->middleware('permission:categorias.edit');
    
    Route::get('/categorias/show/{categoria}', 'CategoriaController@show')->name('categoria.show')
        ->middleware('permission:categorias.show');

    Route::put('/categorias/update/{categoria}', 'CategoriaController@update')->name('categoria.update')
        ->middleware('permission:categorias.update');

    Route::delete('/categorias/destroy/{categoria}', 'CategoriaController@destroy')->name('categoria.destroy')
        ->middleware('permission:categorias.destroy');

    //Merma

    Route::get('/mermas', 'MermaController@index')->name('mermas.index')
        ->middleware('permission:mermas.index');

    Route::get('/mermas/create', 'MermaController@create')->name('mermas.create')
        ->middleware('permission:mermas.create');

    Route::post('/mermas/store', 'MermaController@store')->name('mermas.store')
        ->middleware('permission:mermas.store');

    Route::get('/mermas/edit/{categoria}', 'MermaController@edit')->name('merma.edit')
        ->middleware('permission:mermas.edit');
    
    Route::get('/mermas/show/{merma}', 'MermaController@show')->name('merma.show')
        ->middleware('permission:mermas.show');

    Route::put('/mermas/update/{merma}', 'MermaController@update')->name('merma.update')
        ->middleware('permission:mermas.update');

    Route::delete('/mermas/destroy/{merma}', 'MermaController@destroy')->name('merma.destroy')
        ->middleware('permission:mermas.destroy');
    
        //Insumos Críticos
    Route::get('/reporte/insumos-criticos/', 'InsumosCriticosController@index')->name('insumos.criticos')
        ->middleware('permission:insumos.criticos');   

});