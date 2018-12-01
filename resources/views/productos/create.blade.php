@extends ('layouts.dashboard')
@section('page_heading')
Nuevo Producto
@stop

@section('section')

    {{ Form::open(['route' => 'productos.store']) }}

        @include('productos.partials.formcreate')
                        
    {{ Form::close() }}
                
@stop