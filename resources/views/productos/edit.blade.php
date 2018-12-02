@extends ('layouts.dashboard')
@section('page_heading')
Editar Producto
@stop

@section('section')

   {{ Form::model($producto, ['route' => ['producto.update', $producto->id],
                    'method' => 'PUT']) }}

        @include('productos.partials.formedit')
                        
    {{ Form::close() }}
                
@stop