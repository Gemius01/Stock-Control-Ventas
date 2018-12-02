@extends ('layouts.dashboard')
@section('page_heading')
Editar Categoria
@stop

@section('section')

   {{ Form::model($categoria, ['route' => ['categoria.update', $categoria->id],
                    'method' => 'PUT']) }}

        @include('categorias.partials.formedit')
                        
    {{ Form::close() }}
                
@stop