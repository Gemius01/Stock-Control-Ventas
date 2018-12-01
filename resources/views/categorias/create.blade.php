@extends ('layouts.dashboard')
@section('page_heading')
Nueva Categoría
@stop

@section('section')

    {{ Form::open(['route' => 'categorias.store']) }}

        @include('categorias.partials.formcreate')
                        
    {{ Form::close() }}
                
@stop