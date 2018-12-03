@extends('layouts.plane')

@section('body')

 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">STOCK-CONTROL</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                     /.dropdown-messages 
                </li>
                -->
                <!--
               /.dropdown
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'success', 'value'=>'40'))
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'info', 'value'=>'20'))
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'warning', 'value'=>'60'))
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true,'class'=>'danger', 'value'=>'80'))
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                     /.dropdown-tasks 
                </li>
                -->
                <!-- /.dropdown -->
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                     /.dropdown-alerts 
                </li>
                -->
                <!-- /.dropdown -->
                
                <li class="dropdown dropdown-menu-style">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li> 
                        <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                     <!--
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                               <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                               
                            </span>
                            </div>
                             /input-group 
                        </li>
                        -->
                        @can('usuarios.index')
                        <li {{ (Request::is('/usuarios') ? 'class="active"' : '') }}>
                            <a href="{{ url ('usuarios') }}"><i class="fas fa-users"></i> Usuarios</a>
                        </li>
                        @endcan
                        @can('ventas.index')
                        
                        <li {{ (Request::is('/ventas') ? 'class="active"' : '') }}>
                            <a href="#"><i class="fas fa-hand-holding-usd"></i> Ventas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @can('ventas.create')
                                <li>
                                    <a href="{{ url ('ventas/create') }}"><i class="far fa-money-bill-alt"></i> Registrar Venta</a>
                                </li>
                                @endcan
                                @can('ventas.index')
                                <li>
                                    <a href="{{ url ('ventas') }}"><i class="fas fa-th-list"></i> Listar Ventas</a>
                                </li>
                                @endcan 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endcan
                        @can('productos.index')
                        <li {{ (Request::is('/productos') ? 'class="active"' : '') }}>
                            <a href="#"><i class="fas fa-utensils"></i> Productos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @can('productos.index')
                                <li>
                                    <a href="{{ url ('productos') }}"><i class="fas fa-th-list"></i> Listar Producto</a>
                                </li>
                                @endcan
                                @can('productos.create')
                                <li>
                                    <a href="{{ url ('productos/create') }}"><i class="fas fa-plus-circle"></i> Crear Producto</a>
                                </li>
                                @endcan
                                @can('categoria.create')
                                <li>
                                    <a href="{{ url ('categorias') }}"><i class="fas fa-list-ul"></i> Nueva Categoría</a>
                                </li>
                                @endcan
                                @can('productos.baja.lista')
                                <li>
                                    <a href="{{ url ('productos/lista/baja') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Dados de Baja</a>
                                </li>
                                @endcan
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        @endcan
                        @can('cargas.index')
                        <li {{ (Request::is('/cargas') ? 'class="active"' : '') }}>
                            <a href="{{ url ('cargas') }}"><i class="fas fa-truck-loading"></i> Realizar Carga</a>
                        </li>
                        @endcan
                        <li {{ (Request::is('/informes') ? 'class="active"' : '') }}>
                            <a href="{{ url ('informes') }}"><i class="fas fa-chart-bar"></i> Informes</a>
                        </li>
                        <li {{ (Request::is('/informes') ? 'class="active"' : '') }}>
                            <a href="{{ url ('mermas') }}"><i class="fa fa-trash" aria-hidden="true"></i> Merma</a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
            
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
           @if(session('info'))
            <div class="container">
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            </div>
            @endif
            @if(session('info-danger'))
            <div class="container">
                <div class="alert alert-danger">
                    {!! session('info-danger') !!}
                </div>
            </div>
            @endif
			<div class="row">
            
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
   
@stop

