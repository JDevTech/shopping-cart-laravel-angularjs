@extends('app')
@section('container')
  <link rel="stylesheet" type="text/css" href="{{url('/css/productos.css')}}">
  <div ng-controller="productosCtrl" ng-cloak ng-init="productos={{$productos}};ventaAbierta={{$ventaAbierta}};setInitValues();">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Productos disponibles</h4>
      </div>
      <div class="panel-body">
        <div class="row">
          <div ng-repeat="producto in productos" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="producto-item">
              <div class="container-fluid">
                <div class="producto-image">
                  <img src="{{url('img/without-img.png')}}" alt="producto.prd_nombreproducto">
                </div>
                <div class="product-title text-center">
                  <strong>@{{producto.prd_nombreproducto}}</strong>
                </div>
                <div class="producto-price text-center">
                  <strong>@{{producto.prd_valorproducto | currency: '$':0}}</strong>
                </div>
                <div class="producto-actions">
                  <button type="button" class="btn btn-default" ng-click="addToProduct(producto)" ng-click="addToProduct(producto)" name="arrow-up"><i class="glyphicon glyphicon-plus"></i></button>
                  <input type="number" class="form-control" name="quantity" ng-value="1" ng-model="producto.producto_to_add.dll_cantidad" min="1">
                  <button type="button" class="btn btn-default" ng-click="removeFromProduct(producto)" name="arrow-down"><i class="glyphicon glyphicon-minus"></i></button>
                </div>
                <div class="producto-add-to-cart text-center">
                  <button type="button" name="button" ng-click="addToCart(producto,$event)" ng-disabled="producto.producto_to_add.dll_cantidad == undefined || producto.producto_to_add.dll_cantidadproducto.producto_to_add.dll_cantidad < 1" class="btn btn-success">Agregar al carrito</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script_angularjs')
<script src="{{url('/js/controllers/carritocompras/productosCtrl.js')}}" type="text/javascript" language="javascript"></script>
@endpush
