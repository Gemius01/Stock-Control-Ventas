@extends ('layouts.dashboard')
@section('page_heading')
Detalle Merma - {{$merma->created_at}}

@stop

@section('section')
<p><strong>Código: </strong> {{$merma->producto->codigo}}</p><br>
<p><strong>Nombre: </strong> {{$merma->producto->nombre}}</p><br>
<p><strong>Cantidad de Merma: </strong> {{$merma->cantidad}}</p><br>
<p><strong>Motivo: </strong> {{$merma->motivo}}</p><br>
@stop