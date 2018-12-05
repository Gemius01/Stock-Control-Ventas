@extends ('layouts.dashboard')
@section('page_heading')
REGISTRAR VENTA
@stop

@section('section')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-12">
<form id="formVenta">

<div  class="col-md-12" style="overflow-x:auto">
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
  
    <tr style="margin-bottom:1px;">
        <td>
            <button type="button" class="btn btn-danger remove" id="1">
                <i class="fas fa-trash-alt" id="1"></i>
            </button>
        </td>
        <td scope="row">
            <select class="form-control selectpicker " id="selectProductos" data-live-search="true" data-validation="required"
                    data-validation-if-checked="limited"
                    data-validation-if-checked-value="yes">
                <option disabled selected value> Seleccione un Producto</option>
                @foreach($productos as $producto)
                <option value="{{ $producto->id }}">[{{$producto->codigo}}] {{ $producto->nombre }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <div class="form-group" >
                <input type="number" class="form-control" onkeydown="numberInput(event)" id="total_productos"  name="total_productos" min="1"  required>
                <small id="stockMax"></small>
            </div>
            
        </td>
        <td>
            <div class="form-group">
                <input type="number" class="form-control" onkeydown="numberInput(event)" id="valor_producto"  name="valor_producto" min="0" required>
                <small id="precioNormal"></small>
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
            <button type="submit"  class="btn btn-success btn-lg ">
                <i class="fas fa-check"></i> 
                    Confirmar Venta
            </button>
        </td>
    </tr>
    
  </tbody>
</table>
</div>

</form>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalTotalVenta">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">DATOS DE LA VENTA</h5>
       
      </div>
      <div class="modal-body">
      <table class="table table-bordered" id="tablaVentaConfirmar">
			<thead style="background-color:#0277BD; color:white;">
				<tr>
					<th width="10%">#</th>
                    <th width="20%">Nombre</th>
                    <th width="20%">Cantidad</th>
                    <th width="20%">Precio $</th>
				</tr>
			</thead>
			<tbody>
                
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="guardarVenta()">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<input type="text" id="objProductos" style="display:none;" value="{{$productos}}"/>
<input type="text" id="objProductosStatic" style="display:none;" value="{{$productos}}"/>


<script>
$(document).ready(function(){
    $("#selectProductos").prop('required',true);
});

$('#formVenta').submit(function(e){
    e.preventDefault();
    var allProductsStatic = JSON.parse(document.getElementById('objProductosStatic').value)
    var arrayValidate = []
    for (let i = 0; i < objetos.length; i++) {
        var selectedID = document.getElementById(objetos[i].idSelect).value
        arrayValidate.push(allProductsStatic.find(x => x.id === parseInt(selectedID)))
        console.log('array Validate')
        console.log(arrayValidate)
    }
    var verifyArray = hasDuplicates(arrayValidate)
    if(verifyArray)
    {
        alert('HAY PRODUCTOS REPETIDOS POR FAVOR SOLO DEJE UN REGISTRO POR PRODUCTO')
    }else {
            $('#tablaVentaConfirmar > tbody').empty();
            
            var html = "";
            for (let i = 0; i < objetos.length; i++) {
            var selectProducto = document.getElementById(objetos[i].idSelect).value
            var numberCantidad = document.getElementById(objetos[i].idCantidad).value
            //var numberValor = document.getElementById(objetos[i].idValor).value
            //var totalProductos = totalProductos + parseInt(numberValor);
            
            var objFind = allProductsStatic.find(x => x.id === parseInt(selectProducto))
            
            
                    html += '<tr>'
                    html +='<td>'+objFind.codigo+'</td>'
                    html +='<td>'+objFind.nombre+'</td>'
                    html +='<td>'+numberCantidad+'</td>'
                    //html +='<td>'+numberValor+'</td>'
                    html +='</tr>' 
            
          }
            
            $('#tablaVentaConfirmar > tbody:last-child').append(html);
            
            $('#modalTotalVenta').modal('show');
    }
      
});

var objetos = [{id: 1, idSelect: 'selectProductos', idCantidad: 'total_productos', idValor:'valor_producto'}];
var count = 1;
var countSelect = 1;
var allProducts = JSON.parse(document.getElementById('objProductos').value)
function prueba()
{
    console.log('entre')
    $("#selectProductos2 option[value='1']").remove();
    $("#selectProductos2").selectpicker('refresh');
}
function agregarProducto () {
var allProductsStatic = JSON.parse(document.getElementById('objProductosStatic').value)
    console.log('COUNT SELECT '+ countSelect+ '')
    console.log('COUNT PRODUCTS STATIC'+ allProductsStatic.length+ '')
    console.log('COUNT PRODUCTS '+ allProducts.length+ '')
    console.log(allProducts)
    if(allProductsStatic.length > countSelect)
    {
        
        console.log('entre')
        if(allProductsStatic.length !== 0)
        {
        countSelect = countSelect + 1    
        count = count + 1;
        var arrayProductos
        var html = "";
            html += '<tr>'
            html +='<td><button type="button" class="btn btn-danger remove" id="'+count+'"><i class="fas fa-trash-alt" id="'+count+'"></i></button></td>'
            html += '<td scope="row">'
            html += '<div id="form-input'+count+'">'
            html +='<select class="form-control selectpicker" previous="-1"  onChange="changeSelect(event)" id="selectProductos'+count+'" name="'+count+'" '
            html += 'data-live-search="true" data-validation="required" data-validation-if-checked="limited"'
            html += 'data-validation-if-checked-value="yes" required>'
            html +='<option disabled selected value> Seleccione un Producto</option>'
            html += '<option value="1">[1] Producto Prueba</option>'
            for (let i = 0; i < allProducts.length; i++) {
            html += '<option value="'+allProducts[i].id+'">['+allProducts[i].codigo+'] '+allProducts[i].nombre+'</option>'
                
            }
            html +='</select>'
            html +='</div>'
            html +='</td>'
            html +='<td>'
            html +='<div class="form-group" >'
            html +=    '<input type="number" class="form-control" onkeydown="numberInput(event)" onchange="changeCantidad(event)" id="total_productos'+count+'" min="1"  name="'+count+'" required>'
            html +=    '<small id="stockMax'+count+'"></small>'
            html +='</div>'
            html += '</td>'
            html +='<td>'
            html +='<div class="form-group">'
            html +=    '<input type="number" class="form-control" onkeydown="numberInput(event)" onchange="changeValor(event)" id="valor_producto'+count+'" min="0" name="'+count+'" required>'
            html +=    '<small id="precioNormal'+count+'"></small>'
            html +='</div>'
            html += '</td>'
            html +='<td style="text-align:right;" id="subtotal'+count+'"></td>'
            html +='</tr>'
        $('#tablaProductos tr').eq(-3).before(html);

        $('#selectProductos'+count+'').selectpicker('refresh');

        objetos.push({id: count, idSelect: 'selectProductos'+count+'', idCantidad: 'total_productos'+count+'', idValor:'valor_producto'+count+''}) 
        
        }else {
            
        }
    }else {
        alert('NO HAY MAS PRODUCTOS PARA VENDER')
    }
}
function objetosPrueba() {
    console.log(objetos)
}
function objetosAllPrueba() {
    console.log(allProducts)
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
          window.location.href = '/ventas';
          console.log(response);
         
          
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
}
    var previous;
    
    $("#selectProductos").on('focus', function () {
        // Store the current value on focus and on change
        previous = this.value;
    }).change(function() {
        // Do something with the previous value after the change
        
        
        var allProductsStatic = JSON.parse(document.getElementById('objProductosStatic').value)
        var objBefore = allProductsStatic.find(x => x.id === parseInt(previous))
            console.log("previous" + previous + "")
            if(previous !== undefined)
            {
                for (let i = 2; i <= countSelect; i++) {
                    if("selectProductos" === "selectProductos")
                    {
                        $("#selectProductos"+i+" option").eq(previous)
                            .before($("<option></option>")
                            .val(previous)
                            .text("["+objBefore.codigo+"] "+objBefore.nombre+""));
                        $("#selectProductos"+i+"").selectpicker('refresh');
                    }
                }
         }
         previous = this.value;
        // Make sure the previous value is updated
        //previous = this.value;
        
        $('#total_productos').val('1');
        console.log("default value = " +this.defaultValue+ "")
        var selectid = document.getElementById("selectProductos").value
        if(selectid != 0)
        {
            var valueSelectedBefore = previous
            console.log(valueSelectedBefore)
            var valor_producto = allProductsStatic.find(x => x.id === parseInt(selectid)).precio_venta
            
            var obj = allProductsStatic.find(x => x.id === parseInt(selectid))
            $('#stockMax').empty();
            $('#precioNormal').empty();
            $("#total_productos").attr("max", obj.stock);
            $('#stockMax').append('max : '+ obj.stock +'')
            $('#precioNormal').append('normal : '+ obj.precio_venta +'')
            for (let i = 2; i <= countSelect; i++) {
                if("selectProductos" === "selectProductos")
                {
                    $("#selectProductos"+i+" option[value='"+selectid+"']").remove();
                    $("#selectProductos"+i+"").selectpicker('refresh');
                }
            }
            
            
            
            
        }
        
        $('#valor_producto').val(""+ valor_producto +"");
        
        var total_productoActual = document.getElementById('total_productos').value
        var calculo = total_productoActual * valor_producto
        var indexArray = allProducts.findIndex(x => x.id === parseInt(selectid))
            allProducts.splice(indexArray, 1);
        $('#subtotal').empty();
        $('#subtotal').append("$ "+ formatNumber(calculo) +"");
        totalVenta()
    });
// $( "#selectProductos" ).change(function() {
    
   
// });

$( "#total_productos" ).change(function() {
    
    
    var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          if ($(this).val() > max)
          {
              $(this).val(max);
          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
          }    
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
//////////////
$('.faka').on('focus', function(){
    $(this).data("value", $(this).val());
    }).on('change', function(){
    var orig = $(this).data("value");
    var newVal = $(this).val();
    // Save the newer value 
    $(this).data("value", $(this).val());
    // Do something with both values!
});
/////////////

function changeSelect(e)
{
    
    var previousVal = $(e.target).attr('previous')
    var idInput = $(e.target).attr('id')
    var allProductsStatic = JSON.parse(document.getElementById('objProductosStatic').value)

    if(parseInt(previousVal) !== -1)
    {
        var objBefore = allProductsStatic.find(x => x.id === parseInt(previousVal))
        $("#selectProductos option").eq(previousVal)
                    .before($("<option></option>")
                    .val(previousVal)
                    .text("["+objBefore.codigo+"] "+objBefore.nombre+""));
        $("#selectProductos").selectpicker('refresh');
        for (let i = 2; i <= countSelect; i++) {
            if( idInput !== "selectProductos"+i+"")
            {
                $("#selectProductos"+i+" option").eq(previousVal)
                    .before($("<option></option>")
                    .val(previousVal)
                    .text("["+objBefore.codigo+"] "+objBefore.nombre+""));
                $("#selectProductos"+i+"").selectpicker('refresh');
            }
        }
    }

    var contador = e.target.getAttribute('name');
    var selectid = e.target.getAttribute('id');
    $('#total_productos'+contador+'').val('1');
    
    var selectid = document.getElementById("selectProductos"+contador+"").value
    $(e.target).attr('previous', selectid)
    if(selectid != 0)
    {
        var valor_producto = allProductsStatic.find(x => x.id === parseInt(selectid)).precio_venta
        var obj = allProductsStatic.find(x => x.id === parseInt(selectid))
        $("#total_productos"+contador+'').attr("max", obj.stock);
        $('#precioNormal'+contador+'').empty();
        $('#stockMax'+contador+'').empty();
        $('#precioNormal'+contador+'').append('normal : $'+ formatNumber(obj.precio_venta)+'');
        $('#stockMax'+contador+'').append('max : '+ formatNumber(obj.stock)+'');
        
        for (let i = 2; i <= countSelect; i++) {
            $("#selectProductos option[value='"+selectid+"']").remove();
            $("#selectProductos").selectpicker('refresh');
            if("selectProductos"+contador+"" !== "selectProductos"+i+"")
            {
                $("#selectProductos"+i+" option[value='"+selectid+"']").remove();
                $("#selectProductos"+i+"").selectpicker('refresh');
            }
            
            
        }
    }
    
    $('#valor_producto'+contador+'').val(""+ valor_producto +"");
    var calculo = 1 * valor_producto
    var indexArray = allProducts.findIndex(x => x.id === parseInt(selectid))
        allProducts.splice(indexArray, 1);
    $("#subtotal"+contador+"").empty();
    $("#subtotal"+contador+"").append("$ "+ formatNumber(calculo) +"");
    totalVenta()
}
function changeCantidad(e)
{   
    console.log($('#'+e.target.getAttribute('id')+''))
    var idCantInput = '#'+e.target.getAttribute('id')+'';
    var max = parseInt($(idCantInput).attr('max'));
          var min = parseInt($(idCantInput).attr('min'));
          if ($(idCantInput).val() > max)
          {
              $(idCantInput).val(max);
          }
          else if ($(idCantInput).val() < min)
          {
              $(idCantInput).val(min);
          } 
    var contador = e.target.getAttribute('name');
    var total_productos = document.getElementById("total_productos"+contador+"").value
    var valor_producto = document.getElementById("valor_producto"+contador+"").value
    var calculo = total_productos * valor_producto

    $("#subtotal"+contador+"").empty();
    $("#subtotal"+contador+"").append("$ "+ formatNumber(calculo) +"");
    totalVenta()
}
$('.faka').on('shown.bs.select', function() {
    previous_val = $(this).val();
    console.log('entre 1')
}).change(function() {
    console.log('entre 2')
});
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




function eliminarRow(e) {
    console.log(objetos)
    //var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
    //console.log(e.target.id);
    var index = objetos.findIndex(x => x.id === parseInt(e.target.id))
    
    
    // var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
    // var productoFind = productosStaticos.find(x => x.id === parseInt(e.target.id))
    //countSelect = countSelect - 1;
    
    
    if(parseInt(e.target.id) !== 1)
    {
        var idaBuscar = "selectProductos"+e.target.id+"";
       
        var selectid = document.getElementById(idaBuscar).value;
        
        if(selectid !== "")
        {
            var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
            var productoFind = productosStaticos.find(x => x.id === parseInt(e.target.id))
            var objEncontrado = productosStaticos.find(x => x.id === parseInt(selectid))
            allProducts.push(objEncontrado)
            
                                $("#selectProductos option").eq(1)
                                    .before($("<option></option>")
                                    .val(1)
                                    .text("["+objEncontrado.codigo+"] "+objEncontrado.nombre+""));
                                $("#selectProductos").selectpicker('refresh');
            for (let i = 2; i <= countSelect+1; i++) 
                    {
                        if("selectProductos"+parseInt(e.target.id)+"" !== "selectProductos"+i+"")
                            {
                                
                                $("#selectProductos"+i+" option").eq(1)
                                    .before($("<option></option>")
                                    .val(1)
                                    .text("["+objEncontrado.codigo+"] "+objEncontrado.nombre+""));
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
            console.log('selectid'+ selectid+ '')
            var productoFind = productosStaticos.find(x => x.id === parseInt(selectid))
            
            allProducts.push(productoFind)
            console.log(productoFind)
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

function agregarOptions(id)
{
    if(parseInt(id) !== 1)
        {
            var idDelBoton = this.id
            var selectid = parseInt($( "#selectProductos"+id+"" ).val());
            var productosStaticos = JSON.parse(document.getElementById('objProductosStatic').value)
            var previousSelectVal = $("#selectProductos"+id+"").attr('previous');
            console.log("selectId " + selectid + "")
            var objBefore = productosStaticos.find(x => x.id === selectid)
           
            
            for (let i = 2; i <= countSelect; i++) 
                {
                    if("selectProductos"+parseInt(id)+"" !== "selectProductos"+i+"")
                        {
                            $("#selectProductos"+i+" option").eq(previousSelectVal)
                                .before($("<option></option>")
                                .val(previousSelectVal)
                                .text("["+objBefore.codigo+"] "+objBefore.nombre+""));
                            $("#selectProductos"+i+"").selectpicker('refresh');
                        }
                }
        }else{
            var selectedProduct = document.getElementById("#selectProductos").value
            
            
        }
}

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

$(".numberInput").keydown(function (e) {
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

         
    });
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
@stop