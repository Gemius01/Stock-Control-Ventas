
<div class="form-group col-md-6">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
	@if($errors->has('name'))
	@foreach($errors->get('name',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>

<div class="form-group col-md-6">
	{{ Form::label('email', 'E-Mail') }}
	{{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
	@if($errors->has('email'))
	@foreach($errors->get('email',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
	{{ Form::label('password', 'Contraseña') }}
	{{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
	@if($errors->has('password'))
	@foreach($errors->get('password',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>


<div class="form-group col-md-6">
<label for="role">Rol</label>
	<ul class="list-unstyled">
		@foreach($roles as $role)
		<li>
			<label>
		        {{ Form::radio('roles[]', $role->id, null) }}
		        {{ $role->name }}
	        </label>
		</li>
		@endforeach
	</ul>
	@if($errors->has('roles'))
	@foreach($errors->get('roles',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>

<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>