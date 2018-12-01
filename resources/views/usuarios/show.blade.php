@extends ('layouts.dashboard')
@section('page_heading')
Detalle de Usuario
@stop

@section('section')
    <p><strong>Nombre: </strong> {{ $user->name }} </p>
    <p><strong>E-mail: </strong> {{ $user->email }} </p>
    <p><strong>Rol:</strong>@foreach($roles as $rol) {{ $rol->name }} @endforeach</p>
@stop

