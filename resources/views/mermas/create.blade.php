@extends ('layouts.dashboard')
@section('page_heading')
REGISTRAR MERMA
@stop

@section('section')

    {{ Form::open(['route' => 'mermas.store']) }}

        @include('mermas.partials.formcreate')
                        
    {{ Form::close() }}
                
@stop