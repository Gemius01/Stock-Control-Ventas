@extends ('layouts.dashboard')
@section('page_heading')
Reportes
   
@stop

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
  text: 'Solar Employment Growth by Sector, 2010-2016'
},

subtitle: {
  text: 'Source: thesolarfoundation.com'
},

yAxis: {
  title: {
    text: 'Number of Employees'
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
  name: 'Installation',
  data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
  name: 'Manufacturing',
  data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
  name: 'Sales & Distribution',
  data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
  name: 'Project Development',
  data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
  name: 'Other',
  data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
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