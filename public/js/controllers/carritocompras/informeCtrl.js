app.controller('informeCtrl', ['$scope', '$http', '$filter', '$mdDialog', function($scope, $http, $filter, $mdDialog){

  $scope.resumenTotalVentas = {};

  $scope.setInitValues = () => {

    $scope.resumenTotalVentas.total_iva_19 = 0;
    $scope.resumenTotalVentas.total_iva_0 = 0;
    $scope.resumenTotalVentas.total_iva_8 = 0;
    $scope.resumenTotalVentas.subtotal = 0;
    $scope.resumenTotalVentas.total = 0;

    $scope.ventas.map(venta => {
      $scope.resumenTotalVentas.total_iva_19 += venta.valor_total_items_iva_19;
      $scope.resumenTotalVentas.total_iva_0 += venta.valor_total_items_iva_0;
      $scope.resumenTotalVentas.total_iva_8 += venta.valor_total_items_iva_8;
      $scope.resumenTotalVentas.subtotal += venta.vtn_valorsubtotal;
      $scope.resumenTotalVentas.total += venta.vtn_valortotal;
    });
  }

}]);
