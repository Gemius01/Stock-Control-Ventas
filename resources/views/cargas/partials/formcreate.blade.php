<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-12">
<table class="table" id="tablaProductos">
  <thead>
    <tr>
      <th scope="col" width="70%">Producto</th>
      <th scope="col" width="20%">Cantidad</th>
      <th scope="col" width="10%">Opción</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">
        <select class="form-control selectpicker" id="selectProductos" data-live-search="true">
            @foreach($productos as $producto)
            <option value="{{ $producto->id }}">[{{$producto->codigo}}] {{ $producto->nombre }}</option>
            @endforeach
        </select>
      </td>
      <td>
        <div class="form-group">
            <input type="number" class="form-control" id="total_productos"  name="total_productos" min="1">
        </div>
      </td>
      <td><button type="button" class="btn btn-danger remove-officer-button" id="1"><i class="fas fa-trash-alt"></i></button></td>
    </tr>
    <tr>
        <td colspan="3">
            <button type="button" class="btn btn-primary btn-lg btn-block" onClick="agregarProducto()">Agregar otro producto</button>
        </td>
    </tr>
  </tbody>
</table>
</div>
<input type="text" id="objProductos" style="display:none;" value="{{$productos}}"/>
<div class="form-group col-md-12" style="text-align:right;">
    <button type="button" class="btn btn-primary" onClick="guardarCarga()">Guardar</button>
</div>
	
<script>
$( document ).ready(function() {
  
});

//funciones
var objetos = [{id: 1, idSelect: 'selectProductos', idCantidad: 'total_productos'}];
var count = 1;
function agregarProducto () {

    var allProducts = JSON.parse(document.getElementById('objProductos').value)
    count = count + 1;
    var arrayProductos
    var html = "";
        html += '<tr>'
        html += '<td scope="row">'
        html +='<select class="form-control selectpicker" id="selectProductos'+count+'" data-live-search="true">'
        for (let i = 0; i < allProducts.length; i++) {
           html += '<option value="'+allProducts[i].id+'">['+allProducts[i].codigo+'] '+allProducts[i].nombre+'</option>'
            
        }
        html +='</select>'
        html +='</td>'
        html +='<td>'
        html +='<div class="form-group">'
        html +=    '<input type="number" class="form-control" id="total_productos'+count+'" min="0" name="total_productos">'
        html +='</div>'
        html += '</td>'
        html +='<td><button type="button" class="btn btn-danger remove-officer-button" id="'+count+'"><i class="fas fa-trash-alt"></i></button></td>'
        html +='</tr>'
    $('#tablaProductos tr').eq(-1).before(html);
    //$('#mytable tr').eq(-1).before("<tr><td>new row</td></tr>")
    $('#selectProductos'+count+'').selectpicker('refresh');

    objetos.push({id: count, idSelect: 'selectProductos'+count+'', idCantidad: 'total_productos'+count+''})  
}

function guardarCarga () {
  

  var productos = [];
  var totalProductos = 0;
  for (let i = 0; i < objetos.length; i++) {
    var select = document.getElementById(objetos[i].idSelect).value
    var number = document.getElementById(objetos[i].idCantidad).value
    totalProductos = totalProductos + parseInt(number);
    
    productos.push({id: select, cant: parseInt(number)})
  }
  //console.log(productos)
  $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/cargas/store', // This is the url we gave in the route
      data: {productos: productos, total_productos: totalProductos}, // a JSON object to send back
      success: function(response){ // What to do if we succeed
          //console.log(response);
          window.location.href = '/cargas';
         
          
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
}

function traerProductos(data) 
{
  $.ajax({
      method: 'GET', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/productos/todos', // This is the url we gave in the route
      //data: {productos: productos, total_productos: totalProductos}, // a JSON object to send back
      success: function(response){ // What to do if we succeed
          //console.log(response);
          //window.location.href = response;
          data(response)
          console.log(response)
          
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
}

$("#tablaProductos tbody").on('click', '.remove-officer-button', function(e) {
    
    var whichtr = $(this).closest("tr").remove();
    var index = objetos.findIndex(x => x.id === parseInt(this.id))
    
    if (index > -1) {
        objetos.splice(index, 1);
    }
});

</script>