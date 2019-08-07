@extends('app')
@section('container')
  <div ng-controller="cartCtrl" ng-init="productos={{$productos}};venta={{$venta}};setInitValues()">
    <table class="table table-striped table-bordered">
      <thead>
        <th class="text-center">Producto</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Subtotal</th>
        <th class="text-center">Total</th>
        <th class="text-center">Acciones</th>
      </thead>
      <tfoot>
        <tr>
          <td colspan="2" class="text-left"> <h4>Totales de venta</h4> </td>
          <td colspan="1" class="text-right">@{{venta.vtn_subtotal | currency: '$':0}}</td>
          <td colspan="1" class="text-right">@{{venta.vtn_total | currency: '$':0}}</td>
          <td colspan="1" ng-if="productos.length > 0" class="text-center">
            <button ng-click="confirmarVenta(venta.vtn_estado == 'Cotizacion' ? 'Confirmada' : 'Pagada')" ng-class="venta.vtn_estado == 'Cotizacion' ? 'btn btn-primary': 'btn btn-success'">@{{venta.vtn_estado == 'Cotizacion' ? 'Confirmar venta': 'Pagar venta'}}</button>
          </td>
        </tr>
      </tfoot>
      <tbody>
        <tr ng-if="productos.length == 0">
          <td colspan="5" class="text-center">No hay productos en el carrito de compras</td>
        </tr>
        <tr ng-repeat="producto in productos">
          <td>@{{producto.t_producto.prd_nombreproducto}}</td>
          <td class="text-right">@{{producto.dll_cantidad}}</td>
          <td class="text-right">@{{producto.dll_subtotal | currency: '$':0}}</td>
          <td class="text-right">@{{producto.dll_total | currency: '$':0}}</td>
          <td class="text-center">
            <button class="btn btn-danger" ng-click="deleteItem(producto,$event)"> <i class="glyphicon glyphicon-trash"></i> </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection

@push('script_angularjs')
<script src="{{url('/js/controllers/carritocompras/cartCtrl.js')}}" type="text/javascript" language="javascript"></script>
@endpush
