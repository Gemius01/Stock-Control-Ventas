@extends ('layouts.dashboard')
@section('page_heading')
Registrar Carga
@stop

@section('section')

    {{ Form::open(['route' => 'cargas.store']) }}

        @include('cargas.partials.formcreate')
                        
    {{ Form::close() }}
                
@stop
