@extends ('layouts.dashboard')
@section('page_heading')
Nuevo Usuario
@stop

@section('section')

    {{ Form::open(['route' => 'usuarios.store']) }}

        @include('usuarios.partials.formCreate')
                        
    {{ Form::close() }}
                
@stop