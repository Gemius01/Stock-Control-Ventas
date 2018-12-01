@extends ('layouts.dashboard')
@section('page_heading')
Productos
    @can('categorias.create')
    <a href="{{ route('categorias.create')}}"
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
					<th width="30%">Nombre</th>
                    <th colspan="2" style="text-align:center;" width="20%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @foreach($categorias as $categoria)
				<tr>
					<td>{{ $categoria->nombre }}</td>
                    @can('categorias.edit')
                    <td>
                        <a href="{{ route('categoria.edit', $categoria->id) }}"
                           class="btn btn-sm btn-success">
                           <i class="fas fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    @endcan
                    @can('categorias.destroy')
                    <td>
                        {!! Form::open(['route' => ['categoria.destroy', $categoria->id], 
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