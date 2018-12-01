
<div class="form-group col-md-6" >
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el Nombre">
</div>
<div class="form-group col-md-6">
    <label for="codigo">Código Producto</label>
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el Código">
</div>
<div class="form-group col-md-6">
    <label for="precio_costo">Precio Costo $</label>
    <input type="text" class="form-control" id="precio_costo" name="precio_costo" placeholder="Ingrese Precio Costo">
</div>
<div class="form-group col-md-6">
    <label for="precio_venta">Precio Venta $</label>
    <input type="text" class="form-control" id="precio_venta"  name="precio_venta" placeholder="Ingrese Precio Venta">
</div>
<div class="form-group col-md-6">
    <label for="stock_critico">Stock Crítico</label>
    <input type="text" class="form-control" id="stock_critico"  name="stock_critico" placeholder="Ingrese Stock Crítico">
    <small>Este campo sirve para notificar cuando el insumo se encuentre en stock crítico</small>
</div>
<div class="form-group col-md-6">
    <label for="stock_critico">Categoría</label>
    <select class="form-control" name="categoria_id" id="categoria_id">
        <option>Seleccione Categoría</option>
        @foreach($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
        @endforeach
    </select>

</div>

<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>
