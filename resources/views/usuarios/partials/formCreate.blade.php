
<div class="form-group col-md-6" >
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el Nombre">
</div>

<div class="form-group col-md-6">
    <label for="email">Correo Electrónico</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese E-mail">
</div>
<div class="form-group col-md-6">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Contraseña">
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