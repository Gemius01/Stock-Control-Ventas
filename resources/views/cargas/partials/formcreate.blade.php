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
        <select class="form-control selectpicker" id="selectProductos" data-live-search="true" data-validation="required"
                    data-validation-if-checked="limited"
                    data-validation-if-checked-value="yes">
        <option disabled selected value> Seleccione un Producto</option>
            @foreach($productos as $producto)
            <option value="{{ $producto->id }}">[{{$producto->codigo}}] {{ $producto->nombre }}</option>
            @endforeach
        </select>
      </td>
      <td>
        <div class="form-group">
            <input type="number" class="form-control" onkeydown="numberInput(event)" id="total_productos"  name="total_productos" min="1">
        </div>
      </td>
      <td><button type="button" class="btn btn-danger remove" id="1"><i class="fas fa-trash-alt"></i></button></td>
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
<input type="text" id="objProductosStatic" style="display:none;" value="{{$productos}}"/>
<div class="form-group col-md-12" style="text-align:right;">
    <button type="button" class="btn btn-primary" onClick="guardarCarga()">Guardar</button>
</div>
	
<script>
$( document ).ready(function() {
  
});

//funciones
var objetos = [{id: 1, idSelect: 'selectProductos', idCantidad: 'total_productos'}];
var count = 1;
var countSelect = 1;
var allProductsStatic = JSON.parse(document.getElementById('objProductosStatic').value)
function agregarProducto () {
    
    if(countSelect < allProductsStatic.length)
    {
        countSelect = countSelect + 1;
        var allProducts = JSON.parse(document.getElementById('objProductos').value)
        count = count + 1;
        var arrayProductos
        var html = "";
            html += '<tr>'
            html += '<td scope="row">'
            html +='<select class="form-control selectpicker" id="selectProductos'+count+'" data-live-search="true" '
            html +='data-validation="required"'
            html +='        data-validation-if-checked="limited"'
            html +='       data-validation-if-checked-value="yes" >'
            html += '<option disabled selected value> Seleccione un Producto</option>'
            
            for (let i = 0; i < allProducts.length; i++) {
            html += '<option value="'+allProducts[i].id+'">['+allProducts[i].codigo+'] '+allProducts[i].nombre+'</option>'
                
            }
            html +='</select>'
            html +='</td>'
            html +='<td>'
            html +='<div class="form-group">'
            html +=    '<input type="number" class="form-control" onkeydown="numberInput(event)" id="total_productos'+count+'" min="0" name="total_productos">'
            html +='</div>'
            html += '</td>'
            html +='<td><button type="button" class="btn btn-danger remove" id="'+count+'"><i class="fas fa-trash-alt"></i></button></td>'
            html +='</tr>'
        $('#tablaProductos tr').eq(-1).before(html);
        //$('#mytable tr').eq(-1).before("<tr><td>new row</td></tr>")
        $('#selectProductos'+count+'').selectpicker('refresh');

        objetos.push({id: count, idSelect: 'selectProductos'+count+'', idCantidad: 'total_productos'+count+''})
    }else{
        alert('No hay mas productos para cargar')
    }
  
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

function eliminarRow(e) {
  
    
  //console.log(e.target.id);
  var index = objetos.findIndex(x => x.id === parseInt(e.target.id))
  // var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
  // var productoFind = productosStaticos.find(x => x.id === parseInt(e.target.id))
  //countSelect = countSelect - 1;
  //allProducts.push(productoFind)
  
  if(parseInt(e.target.id) !== 1)
  {
      var idaBuscar = "selectProductos"+e.target.id+"";
     
      var selectid = document.getElementById(idaBuscar).value;
      
      if(selectid !== "")
      {
          var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
          var productoFind = productosStaticos.find(x => x.id === parseInt(e.target.id))
          //console.log(selectid)
                              $("#selectProductos option").eq(1)
                                  .before($("<option></option>")
                                  .val(1)
                                  .text("["+productoFind.codigo+"] "+productoFind.nombre+""));
                              $("#selectProductos").selectpicker('refresh');
          for (let i = 2; i <= countSelect; i++) 
                  {
                      if("selectProductos"+parseInt(e.target.id)+"" !== "selectProductos"+i+"")
                          {
                              
                              $("#selectProductos"+i+" option").eq(1)
                                  .before($("<option></option>")
                                  .val(1)
                                  .text("["+productoFind.codigo+"] "+productoFind.nombre+""));
                              $("#selectProductos"+i+"").selectpicker('refresh');
                          }
                  }
          
      }
      countSelect = countSelect - 1;
      var whichtr = $(this).closest("tr").remove();
      
  }else
  {
      var idaBuscar = "selectProductos";
     
      var selectid = document.getElementById(idaBuscar).value;
      if(selectid !== "")
      {
          var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
          var productoFind = productosStaticos.find(x => x.id === parseInt(e.target.id))
          
          for (let i = 2; i <= countSelect+1; i++) 
                  {
                      if("selectProductos"+parseInt(e.target.id)+"" !== "selectProductos"+i+"")
                          {
                              
                              $("#selectProductos"+i+" option").eq(1)
                                  .before($("<option></option>")
                                  .val(1)
                                  .text("["+productoFind.codigo+"] "+productoFind.nombre+""));
                              $("#selectProductos"+i+"").selectpicker('refresh');
                              
                          }
                  }
      }
      countSelect = countSelect - 1;
      var whichtr = $(this).closest("tr").remove();
      //console.log(selectid)
  }
  
  //console.log(selectid)
  //var whichtr = $(this).closest("tr").remove();
  //agregarOptions(this.id)
  
      
   if (index > -1) {
       objetos.splice(index, 1);
  }
}
$( "#tablaProductos tbody" ).on( "click", '.remove', eliminarRow );
function numberInput (e)
{
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
           
        }
}
</script>