@extends ('layouts.dashboard')
@section('page_heading')
Editar Usuario
@stop

@section('section')

    {!! Form::model($user, ['route' => ['usuarios.update', $user->id],
                    'method' => 'PUT']) !!}

         @include('usuarios.partials.formEdit')

    {!! Form::close() !!}
                
@stop