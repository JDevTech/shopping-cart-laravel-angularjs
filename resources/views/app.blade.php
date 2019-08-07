<?php
  use App\Models\TVenta;
  $ventaAbierta = TVenta::with('t_detalleventa')
  ->whereIn('vtn_estado', ['Cotizacion', 'Confirmada'])->first();
  $ventasRealizadas = TVenta::where('vtn_estado', 'Pagada')->get();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a su tienda virtual</title>

    <script src="{{url('/js/libs/angular.js')}}" type="text/javascript" language="javascript"></script>
    <script src="{{url('/js/libs/angular-material/angular-animate.min.js')}}" type="text/javascript" language="javascript"></script>
    <script src="{{url('/js/libs/angular-material/angular-aria.min.js')}}" type="text/javascript" language="javascript"></script>
    <script src="{{url('/js/libs/angular-material/angular-messages.min.js')}}" type="text/javascript" language="javascript"></script>
    <script src="{{url('/js/libs/angular-material/angular-ngsanitize.js')}}" type="text/javascript" language="javascript"></script>
    <script src="{{url('/js/libs/angular-material/angular-material.min.js')}}" type="text/javascript" language="javascript"></script>

    <script src="{{url('/js/libs/bootstrap/jquery.min.js')}}" type="text/javascript" language="javascript"></script>
    <script src="{{url('/js/libs/bootstrap/jquery-ui.min.js')}}" type="text/javascript" language="javascript"></script>
    <link href="{{url('/js/libs/bootstrap/jquery-ui.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{url('/js/libs/bootstrap/jquery-ui.structure.min.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{url('/js/libs/bootstrap/jquery-ui.theme.min.css')}}" type="text/css" rel="stylesheet"/>

    <script src="{{url('/js/libs/bootstrap/bootstrap.min.js')}}" type="text/javascript" language="javascript"></script>
    <link href="{{url('/js/libs/bootstrap/bootstrap.min.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{url('/js/libs/angular-material/angular-material.css')}}" type="text/css" rel="stylesheet"/>

    <script src="{{url('/js/angular-module.js')}}" type="text/javascript" language="javascript"></script>

    @stack('script_angularjs')

  </head>
  <body ng-app="carrito">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Tienda virtual</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{route('index')}}">Inicio</a></li>
          @if($ventaAbierta != null)
            <li><a href="{{route('cart.edit', ['id' => $ventaAbierta['id']])}}">Mi carrito de compras ({{count($ventaAbierta['t_detalleventa'])}})</a></li>
          @endif
          <li><a href="{{route('informeVentas')}}">Ventas realizadas ({{count($ventasRealizadas)}})</a></li>
        </ul>
        @if($ventaAbierta != null)
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Cliente: {{$ventaAbierta['vtn_cliente']}}</a></li>
          </ul>
        @endif
      </div>
    </nav>

    <div class="container">
      @yield('container')
    </div>
  </body>
</html>
