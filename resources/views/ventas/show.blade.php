@extends ('layouts.dashboard')
@section('page_heading')
Detalle Venta {{ $venta->created_at }}
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
					<th width="20%">Nombre Producto</th>
                    <th width="20%">Cantidad</th>
                    <th width="20%">Valor Unitario</th>
                    <th colspan="1" style="text-align:center;" width="5%"> Detalle </th>
				</tr>
			</thead>
			<tbody>
                @foreach($venta->productos as $producto)
				<tr>
                    <td>{{ $producto->nombre }}</td>
					<td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ $producto->pivot->valor_unitario }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('ventas.show', $venta->id)}}"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            
                        </a>
                    </td>
				</tr>
                @endforeach
                <tr>
                    <td colspan="2" style="text-align:right;"><strong>TOTAL:</strong></td>
                    <td>{{ $venta->valor_neto }}</td>
                    <td></td>
                </tr>
			</tbody>
		</table>
</div>
<script>


</script>
@stop

