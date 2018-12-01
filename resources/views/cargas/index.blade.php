@extends ('layouts.dashboard')
@section('page_heading')
Cargas
    <a href="{{ route('cargas.create')}}"
       class="btn btn-sm btn-primary pull-right">
        <i class="fas fa-plus"></i>
            Registrar Carga
    </a>
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>

					<th width="20%">Cantidad Productos</th>
                    <th width="20%">Fecha de Carga</th>
                    <th colspan="1" style="text-align:center;" width="5%"> Detalle </th>
				</tr>
			</thead>
			<tbody>
                @foreach($cargas as $carga)
				<tr>
                    <td>{{ $carga->total_productos }}</td>
					<td>{{ $carga->created_at }}</td>
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

