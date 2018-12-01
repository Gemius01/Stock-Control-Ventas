@extends ('layouts.dashboard')
@section('page_heading')
Detalle Carga {{ $carga->created_at }}
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
					<th width="20%">Nombre Producto</th>
                    <th width="20%">Cantidad</th>
                    <th colspan="1" style="text-align:center;" width="5%"> Detalle </th>
				</tr>
			</thead>
			<tbody>
                @foreach($carga->productos as $producto)
				<tr>
                    <td>{{ $producto->nombre }}</td>
					<td>{{ $producto->pivot->cantidad }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('cargas.show', $carga->id)}}"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            
                        </a>
                    </td>
				</tr>
                @endforeach
			</tbody>
		</table>
</div>
@stop

