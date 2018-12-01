@extends ('layouts.dashboard')
@section('page_heading')
Cuadraturas
    @can('productos.create')
    <a href="{{ route('cuadraturas.create')}}"
       class="btn btn-sm btn-primary pull-right">
        <i class="fas fa-plus"></i>
            Crear Cuadratura
    </a>
    @endcan
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
                    <th width="20%">Fecha Inicio</th>
                    <th width="15%">Fecha Término</th>
					<th width="15%">N° Ventas</th>
                    <th width="10%">Total Vendido $</th>
					<th width="15%">Total Costo $</th>
                    <th width="15%">Ganancias $</th>
                    
                    <th colspan="3" style="text-align:center;" width="10%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @foreach($cuadraturas as $cuadratura)
                <td>{{ $cuadratura->fecha_inicio }}</td>
                <td>{{ $cuadratura->fecha_termino }}</td>
				<td>{{ $cuadratura->num_ventas }} </td>
                <td>{{ $cuadratura->total_ganancia }}</td>
                <td>{{ $cuadratura->total_coste }}</td>
                <td>{{ $cuadratura->total_ganancia - $cuadratura->total_coste }}</td>
                <td>
                    <a href="{{ route('cuadraturas.show', $cuadratura->id) }}"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            Detalle
                    </a>
                </td>
                <td>
                    <a href="{{ route('usuarios.show', $cuadratura->id) }}"
                           class="btn btn-sm btn-success">
                           <i class="fa fa-table" aria-hidden="true"></i>
                            Excel
                    </a>
                </td>
                @endforeach
			</tbody>
		</table>
</div>
@stop