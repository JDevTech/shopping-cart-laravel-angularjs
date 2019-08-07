@extends('app')
@section('container')

  <div ng-controller="ventasCtrl" ng-cloak>
    <form name="frmVenta" ng-submit="frmVenta.$valid && saveSale()">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Registro de nueva venta</h4>
        </div>
        <div class="panel-body">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
              <label for="nombre">Nombre del cliente:</label>
              <input type="text" class="form-control" name="nombre" ng-model="venta.vtn_cliente" required>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="container-fluid">
            <button type="submit" ng-disabled="!frmVenta.$valid" name="saveSale" class="btn btn-success pull-right">Abrir nueva venta</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@push('script_angularjs')
<script src="{{url('/js/controllers/carritocompras/ventasCtrl.js')}}" type="text/javascript" language="javascript"></script>
@endpush
