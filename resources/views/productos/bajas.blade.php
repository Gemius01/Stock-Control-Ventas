@extends ('layouts.dashboard')
@section('page_heading')
Productos Dados de Baja
    
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
                    <th colspan="4" style="text-align:center;" width="20%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @if(count($productos) == 0)
                <tr><td colspan="7" style="text-align:center;"><strong>NO HAY PRODUCTOS</strong></td></tr>
                @endif
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
                    <td style="text-align:center;">
                        <a href="#"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            Detalle
                        </a>
                    </td>
                    @can('productos.baja')
                    <td style="text-align:center;">
                        {!! Form::open(['route' => ['productos.quitar.baja', $producto->id], 
                            'method' => 'PUT']) !!}
                            <button class="btn btn-sm btn-warning">
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                                Devolver
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