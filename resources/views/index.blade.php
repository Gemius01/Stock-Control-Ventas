@extends('layouts.dashboard')
@section('page_heading','BIENVENIDO')
@section('section')
<div class="col-sm-12">
            <div class="row"> 
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fas fa-box fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Caja</div>
                                    <div>Cuadrar Día / Mes</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('cuadraturas.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Realizar Reporte</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$ventas}}</div>
                                    <div>Ventas</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('ventas.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Ventas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $productosCriticos}}</div>
                                    <div>Insumos Críticos</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('insumos.criticos')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>  
                        </a>
                    </div>
                </div>
            </div>
            
                
            <div class="panel panel-default">
	  
		<div class="panel-heading">
		<h3 class="panel-title">Line Chart			</h3>
	
	</div>
		
	<div class="panel-body">
    <div id="container" width="100px"></div>
	</div>
    <script>
    $(document).ready(function(){
        
Highcharts.chart('container', {

title: {
  text: 'GRÁFICO DE VENTAS TOTALES'
},


yAxis: {
  title: {
    text: 'Número de Ventas'
  }
},
legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

plotOptions: {
  series: {
    label: {
      connectorAllowed: false
    },
    pointStart: 2010
  }
},

series: [{
  name: 'Ventas',
  data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}],

responsive: {
  rules: [{
    condition: {
      maxWidth: 200
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
    });
    </script>          
            
@stop
