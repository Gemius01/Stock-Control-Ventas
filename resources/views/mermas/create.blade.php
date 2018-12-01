@extends ('layouts.dashboard')
@section('page_heading')
Nuevo Producto
@stop

@section('section')

    {{ Form::open(['route' => 'mermas.store']) }}

        @include('mermas.partials.formcreate')
                        
    {{ Form::close() }}
                
@stop