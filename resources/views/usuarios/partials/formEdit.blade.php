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
	<label for="role">Rol</label>
	<ul class="list-unstyled">
		@foreach($roles as $role)
		<li>
			<label>
		        {{ Form::checkbox('roles[]', $role->id, null) }}
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
<hr>

<div class="form-group">
	<center>
	<button type="submit"  class="btn btn-sm btn-primary" name="submitBtn" onclick="this.disabled=true;this.form.submit();">Guardar</button>
	</center>
</div>