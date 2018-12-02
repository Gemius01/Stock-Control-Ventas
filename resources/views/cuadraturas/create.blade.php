@extends ('layouts.dashboard')
@section('page_heading')
Nueva Cuadratura
    @can('productos.create')
    <a href="#"
       onClick="guardarCuadratura()"
       class="btn btn-sm btn-primary pull-right">
        <i class="fas fa-plus"></i>
            GUARDAR CUADRATURA
    </a>
    @endcan
@stop

@section('section')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="form-group col-md-5">
<label for="exampleFormControlSelect1">Fecha de INICIO</label>
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" id="fechaInicio"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<div class="form-group col-md-5">
<label for="exampleFormControlSelect1">Fecha de TERMINO</label>
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" id="fechaTermino" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="form-group col-md-2">
<button type="button" class="btn btn-primary mb-2" onClick="buscarFechas()" style="margin-top:24px;"> <i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
</div>
<hr />

		<table class="table table-bordered" id="tablaVentas">
			<thead style="background-color:#0277BD; color:white;">
				<tr> 
                    <th width="20%">Fecha / Hora</th>
                    <th width="20%">Valor Neto</th>
                    <th colspan="1" style="text-align:center;" width="5%"> Detalle </th>
				</tr>
			</thead>
			<tbody>
                
			</tbody>
		</table>
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modalVentaDetalle">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Detalle Venta</h5>
      </div>
      <div class="modal-body" id="contentBodyModal">
        <table class="table table-bordered" id="tablaDetalleVentas">
			<thead style="background-color:#0277BD; color:white;">
				<tr> 
                    <th width="10%">#</th>
                    <th width="20%">Producto</th>
                    <th width="20%">Cantidad</th>
                    <th width="20%">Precio Costo </th>
                    <th width="15%">Precio Venta Normal </th>
                    <th width="15%">Precio Vendido </th>
				</tr>
			</thead>
			<tbody>
                
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->
<div style="display:none;">
<input id="ventasBuscadas"/>
<input id="fechaInicioInput"/>
<input id="fechaTerminoInput"/>
</div>
<script>
$(document).ready(function(){
    $('.date').datepicker({
        language: 'es',
        format: 'dd-mm-yyyy'
    });
    
});
var ventasReunidas = []
function buscarFechas()
{
    var fechaInicio = document.getElementById('fechaInicio').value
    var fechaTermino = document.getElementById('fechaTermino').value
    $('#fechaInicioInput').val(fechaInicio)
    $('#fechaTerminoInput').val(fechaTermino)
    $.ajax({
      method: 'GET', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/cuadraturas/buscar/'+fechaInicio+'/'+fechaTermino+'', // This is the url we gave in the route
      //data: {productos: productos, total_venta: parseInt(totalProductos) }, // a JSON object to send back
      success: function(response){ // What to do if we succeed
      
          if(response.length !== 0)
          {
            
            $('#ventasBuscadas').val(JSON.stringify(response));
            $("#tablaVentas > tbody").empty();
            for (let i = 0; i < response.length; i++) {
                var html = ""
                html += "<tr>"
                html +=     '<td>'+response[i].created_at+'</td>'
                html +=     '<td>'+response[i].valor_neto+'</td>'
                html +=     '<td ><a href="#" onClick="toggleModal('+response[i].id+')"'
                html +=                'class="btn btn-sm btn-primary">'
                html +=           '<i class="fas fa-search"></i>'
                html +=        '</a> </td>'
                html += "</tr>"
                $('#tablaVentas > tbody:last-child').append(html);
            }
          }
          
         
          
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
}

function toggleModal(idVenta)
{
    
    $.ajax({
      method: 'GET', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/cuadraturas/buscarventa/'+idVenta+'', // This is the url we gave in the route
      //data: {productos: productos, total_venta: parseInt(totalProductos) }, // a JSON object to send back
      success: function(response){ // What to do if we succeed
          if(response.length !== 0)
          {
            $('#tituloModal').empty();
            $('#tituloModal').append('<h4>Detalle Venta</h4>');
            $("#tablaDetalleVentas > tbody").empty();
            
            for (let i = 0; i < response.length; i++) {
                var html = ""
                    html += "<tr>"
                    html +=     '<td>'+response[i].codigo+'</td>'
                    html +=     '<td>'+response[i].nombre+'</td>'
                    html +=     '<td>'+response[i].pivot.cantidad+'</td>'
                    html +=     '<td>'+response[i].precio_costo+'</td>'
                    html +=     '<td>'+response[i].precio_venta+'</td>'
                    html +=     '<td>'+response[i].pivot.valor_unitario+'</td>'
                    html += "</tr>"
            $('#tablaDetalleVentas > tbody:last-child').append(html);
            }
            $('#modalVentaDetalle').modal('show');
          }else{
            $('#tituloModal').empty();
            $("#tablaDetalleVentas > tbody").empty();
            $('#tituloModal').append('<h4>No hay productos en esta venta</h4>');
            $('#modalVentaDetalle').modal('show');
          }
          
         
          
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
    
}

function guardarCuadratura ()
{
    var fechaInicio = document.getElementById('fechaInicioInput').value
    var fechaTermino = document.getElementById('fechaTerminoInput').value

    var ventas = document.getElementById('ventasBuscadas').value
    var obj = JSON.parse(ventas)
    $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/cuadraturas/store/', // This is the url we gave in the route
      data: {ventas: obj, fecha_inicio: fechaInicio, fecha_termino: fechaTermino}, // a JSON object to send back
      success: function(response){ // What to do if we succeed
           console.log(response)
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
}
</script>
@stop