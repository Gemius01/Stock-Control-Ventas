<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="form-group col-md-6">
	{{ Form::label('producto_id', 'Seleccione Producto') }}
	{!! Form::select('producto_id', $productos, null, ['class' => 'form-control selectpicker', 'placeholder' => 'Seleccione Producto', 'data-live-search' => 'true']) !!}
	@if($errors->has('producto_id'))
	@foreach($errors->get('producto_id',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>

<div class="form-group col-md-6">
	{{ Form::label('cantidad', 'Cantidad de merma') }}
	{{ Form::number('cantidad', null, ['class' => 'form-control','min' => '1', 'onkeydown' => 'numberInput(event)']) }}
	<small id="stockMax"></small>
	@if($errors->has('cantidad'))
	@foreach($errors->get('cantidad',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>


<div class="form-group col-md-6">
	{{ Form::label('motivo', 'Motivo de la merma') }}
	{{ Form::textarea('motivo', null, ['class' => 'form-control']) }}
	@if($errors->has('motivo'))
	@foreach($errors->get('motivo',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group col-md-12" style="text-align:right;">
    <button type="submit" class="btn btn-primary" >Guardar</button>
</div>
<script>
$( "#producto_id" ).change(function() {
    
	var selectid = document.getElementById('producto_id').value;
  //console.log(productos)
  $.ajax({
      method: 'GET', // Type of response and matches what we said in the route
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/producto/stock/'+selectid+'', // This is the url we gave in the route
      //data: {productos: productos, total_venta: parseInt(totalProductos) }, // a JSON object to send back
      success: function(response){ // What to do if we succeed
          //console.log(response);
          //window.location.href = '/ventas';
          console.log(response);
		  //$('#cantidad').attr('max', response);
		  $('#stockMax').empty();
		  $('#stockMax').append('max : '+ response+'');
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          //console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    }); 
});

$( "#cantidad" ).change(function() {
    
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