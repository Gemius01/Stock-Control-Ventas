@extends ('layouts.dashboard')
@section('page_heading')
USUARIOS
    <a href="{{ route('usuarios.create') }}"
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
					<th>Nombre</th>
					<th>E-Mail</th>
                    <th>Cargo</th>
                    <th colspan="3" style="text-align:center;" width="30%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
                @if(count($usuarios) == 0)
                <tr><td colspan="7" style="text-align:center;"><strong>NO HAY USUARIOS</strong></td></tr>
                @endif
                @foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->name }}</td>
					<td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->roles()->first()['name'] }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                           class="btn btn-sm btn-success">
                           <i class="fas fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route('usuarios.show', $usuario->id) }}"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-search"></i>
                            Detalle
                        </a>
                    </td>
                    <td style="text-align:center;">
                        
                        {!! Form::open(['route' => ['usuarios.destroy', $usuario->id],
                                    'method' => 'DELETE']) !!}
                                        <button onclick="return confirm('¿Esta seguro de eliminar?')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-edit"></i>
                                            Eliminar
                                        </button>
                                {!! Form::close() !!}
                    </td>
				</tr>
                @endforeach
			</tbody>
		</table>
        </div>
@stop