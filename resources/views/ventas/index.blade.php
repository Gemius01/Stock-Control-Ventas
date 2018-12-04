@extends ('layouts.dashboard')
@section('page_heading')
VENTAS
    <a href="{{ route('ventas.create')}}"
       class="btn btn-sm btn-primary pull-right">
        <i class="fas fa-plus"></i>
            Registrar Venta
    </a>
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
					<th width="20%">Fecha / Hora</th>
                    <th width="20%">Valor Venta</th>
                    <th colspan="1" style="text-align:center;" width="5%"> Detalle </th>
				</tr>
			</thead>
			<tbody>
            @if(count($ventas) == 0)
                <tr><td colspan="3" style="text-align:center;"><strong>NO SE HAN REALIZADO VENTAS</strong></td></tr>
                @endif
                @foreach($ventas as $venta)
				<tr>
                    <td>{{ $venta->created_at }}</td>
					<td>{{ $venta->valor_neto }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('ventas.show', $venta->id)}}"
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

