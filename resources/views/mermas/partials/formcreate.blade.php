<div class="form-group col-md-6">
	{{ Form::label('cantidad', 'Cantidad de merma') }}
	{{ Form::number('cantidad', null, ['class' => 'form-control']) }}
	@if($errors->has('motivo'))
	@foreach($errors->get('name',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
	{{ Form::label('producto', 'Seleccione Producto') }}
	{!! Form::select('producto', $productos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Producto']) !!}
</div>
<div class="form-group col-md-6">
	{{ Form::label('motivo', 'Motivo de la merma') }}
	{{ Form::textarea('motivo', null, ['class' => 'form-control']) }}
	@if($errors->has('motivo'))
	@foreach($errors->get('name',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
