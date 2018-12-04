@extends ('layouts.dashboard')
@section('page_heading')
PRODUCTOS CRÍTICOS

@stop

@section('section')

<table class="table table-bordered" >
			<thead style="background-color:#0277BD; color:white;">
				<tr>
					<th width="20%">#</th>
					<th width="30%">Nombre</th>
                    <th width="10%">Stock Actual</th>
                    <th width="30%">Stock Crítico</th>
				</tr>
			</thead>
			<tbody>
				@if(count($productos) == 0)
                <tr><td colspan="7" style="text-align:center;"><strong>NO HAY PRODUCTOS CON STOCK CRÍTICO</strong></td></tr>
                @endif
                @foreach($productos as $producto)
				<tr>
					<td>{{ $producto->codigo }}</td>
					<td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->stock_critico }}</td>
				</tr>
                @endforeach
			</tbody>
		</table>

@stop