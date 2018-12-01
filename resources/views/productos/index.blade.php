@extends ('layouts.dashboard')
@section('page_heading')
Productos
    @can('productos.create')
    <a href="{{ route('productos.create')}}"
       class="btn btn-sm btn-primary pull-right">
        <i class="fas fa-plus"></i>
            Nuevo
    </a>
    @endcan
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
                    <th width="10%">#</th>
					<th width="30%">Nombre</th>
                    <th width="10%">Categoría</th>
                    @role('administrador')
					<th width="10%">Precio Costo $</th>
                    @endrole
                    <th width="10%">Precio Venta $</th>
                    <th width="10%">Stock</th>
                    <th colspan="3" style="text-align:center;" width="20%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @foreach($productos as $producto)
				<tr>
                    <td>{{ $producto->codigo }}</td>
					<td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    @role('administrador')
					<td>{{ $producto->precio_costo }}</td>
                    @endrole
                    <td>{{ $producto->precio_venta }}</td>
                    <td>{{ $producto->stock }}</td>
                    @can('productos.edit')
                    <td>
                        <a href="{{ route('producto.edit', $producto->id) }}"
                           class="btn btn-sm btn-success">
                           <i class="fas fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    @endcan
                    <td style="text-align:center;">
                        <a href="#"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            Detalle
                        </a>
                    </td>
                    @can('productos.destroy')
                    <td>
                        {!! Form::open(['route' => ['producto.destroy', $producto->id], 
                            'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        {!! Form::close() !!}
                    </td>
                    @endcan
				</tr>
                @endforeach
			</tbody>
		</table>
</div>
@stop