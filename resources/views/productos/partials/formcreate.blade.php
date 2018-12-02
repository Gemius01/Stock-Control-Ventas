<div class="form-group col-md-6" >
    {{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Ingrese Nombre', 'id' => 'nombre']) }}
    @if($errors->has('nombre'))
	@foreach($errors->get('nombre',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
    {{ Form::label('codigo', 'Código Producto') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Codigo', 'id' => 'codigo']) }}
    @if($errors->has('codigo'))
	@foreach($errors->get('codigo',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
    {{ Form::label('precio_costo', 'Precio Costo $') }}
	{{ Form::number('precio_costo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Costo', 'id' => 'precio_costo']) }}
    @if($errors->has('precio_costo'))
	@foreach($errors->get('precio_costo',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
    {{ Form::label('precio_venta', 'Precio Venta $') }}
	{{ Form::number('precio_venta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Precio', 'id' => 'precio_venta']) }}
    @if($errors->has('precio_venta'))
	@foreach($errors->get('precio_venta',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
    {{ Form::label('stock_critico', 'Stock Crítico') }}
	{{ Form::number('stock_critico', null, ['class' => 'form-control','placeholder' => 'Ingrese Stock Critico', 'id' => 'stock_critico']) }}
    <small>Este campo sirve para notificar cuando el insumo se encuentre en stock crítico</small>
    @if($errors->has('stock_critico'))
	@foreach($errors->get('stock_critico',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-6">
    {{ Form::label('producto', 'Categoría') }}
    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Categoria']) !!}
    @if($errors->has('categoria_id'))
	@foreach($errors->get('categoria_id',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>



<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>
