@extends ('layouts.dashboard')
@section('page_heading')
REGISTRAR CARGA
@stop

@section('section')

    {{ Form::open(['route' => 'cargas.store']) }}

        @include('cargas.partials.formcreate')
                        
    {{ Form::close() }}
                
@stop
