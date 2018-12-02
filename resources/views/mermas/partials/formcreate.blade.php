<div class="form-group col-md-6">
	{{ Form::label('producto_id', 'Seleccione Producto') }}
	{!! Form::select('producto_id', $productos, null, ['class' => 'form-control selectpicker', 'placeholder' => 'Seleccione Producto', 'data-live-search' => 'true']) !!}
</div>
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
	{{ Form::label('motivo', 'Motivo de la merma') }}
	{{ Form::textarea('motivo', null, ['class' => 'form-control']) }}
	@if($errors->has('motivo'))
	@foreach($errors->get('name',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>