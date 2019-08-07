@extends('app')
@section('container')

  <div ng-controller="informeCtrl" ng-cloak ng-init="ventas={{$ventas}};setInitValues();">
    <table class="table table-striped table-bordered">
      <thead>
        <th class="text-center">Venta No.</th>
        <th class="text-center">Cliente</th>
        <th class="text-center">Cant. Productos</th>
        <th class="text-center">Total iva 0%</th>
        <th class="text-center">Total iva 8%</th>
        <th class="text-center">Total iva 19%</th>
        <th class="text-center">Subtotal venta</th>
        <th class="text-center">Total venta</th>
      </thead>
      <tfoot>
        <tr ng-if="ventas.length > 0">
          <td colspan="3"><h4>Resumen total ventas</h4></td>
          <td colspan="1" class="text-right"><strong>@{{resumenTotalVentas.total_iva_0 | currency: '$': 0}}</strong></td>
          <td colspan="1" class="text-right"><strong>@{{resumenTotalVentas.total_iva_8 | currency: '$': 0}}</strong></td>
          <td colspan="1" class="text-right"><strong>@{{resumenTotalVentas.total_iva_19 | currency: '$': 0}}</strong></td>
          <td colspan="1" class="text-right"><strong>@{{resumenTotalVentas.subtotal | currency: '$': 0}}</strong></td>
          <td colspan="1" class="text-right"><strong>@{{resumenTotalVentas.total | currency: '$': 0}}</strong></td>
        </tr>
      </tfoot>
      <tbody>
        <tr ng-if="ventas.length == 0">
          <td colspan="8" class="text-center">No se ha registrado ninguna venta.</td>
        </tr>
        <tr ng-repeat="venta in ventas">
          <td class="text-center">@{{venta.id}}</td>
          <td class="text-center">@{{venta.vtn_cliente}}</td>
          <td class="text-center">@{{venta.t_detalleventa.length}}</td>
          <td class="text-right">@{{venta.valor_total_items_iva_0 | currency: '$': 0}}</td>
          <td class="text-right">@{{venta.valor_total_items_iva_8 | currency: '$': 0}}</td>
          <td class="text-right">@{{venta.valor_total_items_iva_19 | currency: '$': 0}}</td>
          <td class="text-right">@{{venta.vtn_valorsubtotal | currency: '$': 0}}</td>
          <td class="text-right">@{{venta.vtn_valortotal | currency: '$': 0}}</td>
        </tr>
      </tbody>
    </table>
  </div>

@endsection
@push('script_angularjs')
<script src="{{url('/js/controllers/carritocompras/informeCtrl.js')}}" type="text/javascript" language="javascript"></script>
@endpush
