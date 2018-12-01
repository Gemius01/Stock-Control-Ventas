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
                    <th width="10%">Fecha Inicio</th>
                    <th width="10%">Fecha Término</th>
					<th width="30%">N° Ventas</th>
                    <th width="10%">Total Vendido $</th>
					<th width="10%">Total Costo $</th>
                    <th width="10%">Ganancias $</th>
                    
                    <th colspan="3" style="text-align:center;" width="20%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @foreach($cuadraturas as $cuadratura)
                <td></td>
                <td></td>
				<td>{{ $cuadratura->num_ventas }} </td>
                <td>{{ $cuadratura->total_ganancia }}</td>
                <td>{{ $cuadratura->total_coste }}</td>
                <td>{{ $cuadratura->total_ganancia - $cuadratura->total_coste }}</td>
                <td></td>
                @endforeach
			</tbody>
		</table>
</div>
@stop