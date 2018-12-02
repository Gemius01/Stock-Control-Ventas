


<div class="form-group col-md-6">
	{{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
	@if($errors->has('nombre'))
	@foreach($errors->get('nombre',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>

<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>