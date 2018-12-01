@extends ('layouts.dashboard')
@section('page_heading')
Cuadrar Caja
   
@stop

@section('section')
<div class="form-group col-md-5">
    <label for="exampleFormControlSelect1">Fecha de INICIO</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option selected disabled>Seleccione Fecha</option>
    </select>
</div>
<div class="form-group col-md-5">
    <label for="exampleFormControlSelect1">Fecha de TERMINO</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option selected disabled>Seleccione Fecha</option>
    </select>
</div>
<div class="form-group col-md-2">
<button type="submit" class="btn btn-primary mb-2" style="margin-top:24px;">Buscar</button>
</div>
<hr />
<div class="form-group col-md-12" style="overflow-x:auto;margin-top">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
                    <th width="10%">#</th>
					<th width="30%">Nombre</th>
                    <th width="10%">Categoría</th>
					<th width="10%">Precio Costo $</th>
                    <th width="10%">Precio Venta $</th>
                    <th width="10%">Stock</th>
                    <th colspan="3" style="text-align:center;" width="20%"> Opciones </th>
				</tr>
			</thead>
			<tbody>
               
			</tbody>
		</table>
</div>
@stop