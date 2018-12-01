@extends ('layouts.dashboard')
@section('page_heading')
Cuadraturas
    
@stop

@section('section')
<div style="overflow-x:auto;">
		<table class="table table-bordered">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
                    <th width="20%"># Venta</th>
                    <th width="20%">Fecha / Hora</th>
                    <th width="20%">Valor Neto</th>
                    <th  style="text-align:center;" width="5%"> Detalle </th>
				</tr>
			</thead>
			<tbody>
                @foreach($cuadratura->ventas()->get() as $key=>$venta)
                <td>Venta N°{{$key+1}}</td>
                <td>{{ $venta->created_at }}</td>
                <td>{{ $venta->valor_neto }}</td>
                <td style="text-align:center;">
                    <a  href="#"
                        onClick="toggleModal({{ $venta->id }})"
                        class="btn btn-sm btn-primary">
                            <i class="fas fa-search"></i>
                    </a>
                </td>
                
                @endforeach
			</tbody>
		</table>
</div>
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
<script>
$(document).ready(function(){

});
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
</script>
@stop