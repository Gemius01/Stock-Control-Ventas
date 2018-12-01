@extends ('layouts.dashboard')
@section('page_heading')
Registrar Venta
@stop

@section('section')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-12">
<table class="table" id="tablaProductos">
  <thead>
    <tr>
        <th scope="col" width="5%">Opción</th>
        <th scope="col" width="50%">Producto</th>
        <th scope="col" width="12%">Cantidad</th>
        <th scope="col" width="12%">Precio $</th>
        <th scope="col" width="16%" style="text-align:right;">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>
            <button type="button" class="btn btn-danger remove-officer-button" id="1">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
        <td scope="row">
            <select class="form-control selectpicker" id="selectProductos" data-live-search="true">
                <option value="0" selected disabled>Seleccione un Producto</option>
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
        <td>
            <div class="form-group">
                <input type="number" class="form-control" id="valor_producto"  name="valor_producto" min="0">
            </div>
        </td>
        <td  style="text-align:right;" id="subtotal">
        
        </td>
    </tr>
    <tr>
        <td colspan="5">
            <button type="button" class="btn btn-primary btn-lg btn-block" onClick="agregarProducto()">Agregar otro producto</button>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:right;"><h4><strong>TOTAL: </strong></h4></td>
        <td style="text-align:right;" id="total">
            <h4>0</h4>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:right;"></td>
        <td style="text-align:right;">
            <button type="button" onClick="guardarVenta()" class="btn btn-success btn-lg ">
                <i class="fas fa-check"></i> 
                    Confirmar Venta
            </button>
        </td>
    </tr>
  </tbody>
</table>
</div>
<input type="text" id="objProductos" style="display:none;" value="{{$productos}}"/>


<script>
$(document).ready(function(){

});

var objetos = [{id: 1, idSelect: 'selectProductos', idCantidad: 'total_productos', idValor:'valor_producto'}];
var count = 1;

function agregarProducto () {

var allProducts = JSON.parse(document.getElementById('objProductos').value)
count = count + 1;
var arrayProductos
var html = "";
    html += '<tr>'
    html +='<td><button type="button" class="btn btn-danger remove-officer-button" id="'+count+'"><i class="fas fa-trash-alt"></i></button></td>'
    html += '<td scope="row">'
    html += '<div id="form-input'+count+'">'
    html +='<select class="form-control selectpicker" onchange="changeSelect(event)" id="selectProductos'+count+'" name="'+count+'" data-live-search="true">'
    html +='<option value="0" selected disabled>Seleccione Producto</option>'
    for (let i = 0; i < allProducts.length; i++) {
       html += '<option value="'+allProducts[i].id+'">['+allProducts[i].codigo+'] '+allProducts[i].nombre+'</option>'
        
    }
    html +='</select>'
    html +='</div>'
    html +='</td>'
    html +='<td>'
    html +='<div class="form-group" >'
    html +=    '<input type="number" class="form-control" onchange="changeCantidad(event)" id="total_productos'+count+'" min="0" name="'+count+'">'
    html +='</div>'
    html += '</td>'
    html +='<td>'
    html +='<div class="form-group">'
    html +=    '<input type="number" class="form-control" onchange="changeValor(event)" id="valor_producto'+count+'" min="0" name="'+count+'">'
    html +='</div>'
    html += '</td>'
    html +='<td style="text-align:right;" id="subtotal'+count+'"></td>'
    html +='</tr>'
$('#tablaProductos tr').eq(-3).before(html);

$('#selectProductos'+count+'').selectpicker('refresh');

objetos.push({id: count, idSelect: 'selectProductos'+count+'', idCantidad: 'total_productos'+count+'', idValor:'valor_producto'+count+''})  
}

function guardarVenta () {
  

  var productos = [];
  var totalProductos = 0;
  for (let i = 0; i < objetos.length; i++) {
    var selectProducto = document.getElementById(objetos[i].idSelect).value
    var numberCantidad = document.getElementById(objetos[i].idCantidad).value
    var numberValor = document.getElementById(objetos[i].idValor).value
    totalProductos = totalProductos + parseInt(numberValor);
    
    productos.push({id: selectProducto, cant: parseInt(numberCantidad), valor: parseInt(numberValor)})
  }
  //console.log(productos)
  $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/ventas/store', // This is the url we gave in the route
      data: {productos: productos, total_venta: parseInt(totalProductos) }, // a JSON object to send back
      success: function(response){ // What to do if we succeed
          //console.log(response);
          //window.location.href = '/ventas';
          console.log(response);
         
          
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
}
$( "#selectProductos" ).change(function() {
    var allProducts = JSON.parse(document.getElementById('objProductos').value)
    $('#total_productos').val('1');
    var selectid = document.getElementById("selectProductos").value
    if(selectid != 0)
    {
        var valor_producto = allProducts.find(x => x.id === parseInt(selectid)).precio_venta
    }
    
    $('#valor_producto').val(""+ valor_producto +"");
    var calculo = 1 * valor_producto

    $('#subtotal').empty();
    $('#subtotal').append("$ "+ formatNumber(calculo) +"");
    totalVenta()
});

$( "#total_productos" ).change(function() {
    
    var total_productos = document.getElementById("total_productos").value
    var valor_producto = document.getElementById("valor_producto").value
    var calculo = total_productos * valor_producto

    $('#subtotal').empty();
    $('#subtotal').append("$ "+ formatNumber(calculo) +"");
    totalVenta()
});

$( "#valor_producto" ).change(function() {
    
    var total_productos = document.getElementById("total_productos").value
    var valor_producto = document.getElementById("valor_producto").value
    var calculo = total_productos * valor_producto

    $('#subtotal').empty();
    $('#subtotal').append("$ "+ formatNumber(calculo) +"");
    totalVenta()
});

function changeSelect(e)
{
    var contador = e.target.getAttribute('name');
    var allProducts = JSON.parse(document.getElementById('objProductos').value)
    $('#total_productos'+contador+'').val('1');
    var selectid = document.getElementById("selectProductos"+contador+"").value
    if(selectid != 0)
    {
        var valor_producto = allProducts.find(x => x.id === parseInt(selectid)).precio_venta
    }
    
    $('#valor_producto'+contador+'').val(""+ valor_producto +"");
    var calculo = 1 * valor_producto
    $("#subtotal"+contador+"").empty();
    $("#subtotal"+contador+"").append("$ "+ formatNumber(calculo) +"");
    totalVenta()
}
function changeCantidad(e)
{
    var contador = e.target.getAttribute('name');
    var total_productos = document.getElementById("total_productos"+contador+"").value
    var valor_producto = document.getElementById("valor_producto"+contador+"").value
    var calculo = total_productos * valor_producto

    $("#subtotal"+contador+"").empty();
    $("#subtotal"+contador+"").append("$ "+ formatNumber(calculo) +"");
    totalVenta()
}

function changeValor(e)
{
    var contador = e.target.getAttribute('name');
    var total_productos = document.getElementById("total_productos"+contador+"").value
    var valor_producto = document.getElementById("valor_producto"+contador+"").value
    var calculo = total_productos * valor_producto

    $("#subtotal"+contador+"").empty();
    $("#subtotal"+contador+"").append("$ "+ formatNumber(calculo) +"");
    totalVenta()
}

//Quitar fila de la tabla
$("#tablaProductos tbody").on('click', '.remove-officer-button', function(e) {
    
    var whichtr = $(this).closest("tr").remove();
    var index = objetos.findIndex(x => x.id === parseInt(this.id))
    
    if (index > -1) {
        objetos.splice(index, 1);
    }
});

//Función para formatear numeros a miles ej. 100000 => 100.000
function formatNumber (n) {
	n = String(n).replace(/\D/g, "");
  return n === '' ? n : Number(n).toLocaleString();
}

function totalVenta()
{
    var total = 0;
    for (let i = 0; i < objetos.length; i++) {
        var valor_producto = document.getElementById(objetos[i].idValor).value
        var cantidad_producto = document.getElementById(objetos[i].idCantidad).value
        total = total + (valor_producto * cantidad_producto)
    }
    $('#total').empty();
    $('#total').append('<h4>'+formatNumber(total)+'</h4>')
    
}
</script>
@stop