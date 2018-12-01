

<div class="form-group">
	{{ Form::label('codigo', 'Código #') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'id' => 'codigo']) }}
</div>
<div class="form-group">
	{{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('precio_costo', 'Precio Costo $') }}
	{{ Form::number('precio_costo', null, ['class' => 'form-control', 'id' => 'precio_costo']) }}
</div>
<div class="form-group">
	{{ Form::label('precio_venta', 'Precio Venta $') }}
	{{ Form::number('precio_venta', null, ['class' => 'form-control', 'id' => 'precio_venta']) }}
</div>
<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>
