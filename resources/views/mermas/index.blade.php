@extends ('layouts.dashboard')
@section('page_heading')
MERMAS
    <a href="{{ route('mermas.create') }}"
       class="btn btn-sm btn-primary pull-right">
        <i class="fas fa-plus"></i>
            Nuevo
    </a>
@stop

@section('section')
<div style="overflow-x:auto;">
<table class="table table-bordered" >
			<thead style="background-color:#0277BD; color:white;">
				<tr>
					<th width="20%">Fecha</th>
					<th width="30%">Producto</th>
                    <th width="10%">Cantidad</th>
                    <th width="30%">Motivo</th>
                    <th colspan="3" style="text-align:center;" width="10%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @foreach($mermas as $merma)
				<tr>
					<td>{{ $merma->created_at }}</td>
					<td>{{ $merma->producto->nombre }}</td>
                    <td>{{ $merma->cantidad }}</td>
                    <td>{{ $merma->motivo }}</td>
                    
                    <td style="text-align:center;">
                        <a href="{{ route('merma.show', $merma->id) }}"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            Detalle
                        </a>
                    </td>
				</tr>
                @endforeach
			</tbody>
		</table>
        </div>
@stop