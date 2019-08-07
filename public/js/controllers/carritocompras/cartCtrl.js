app.controller('cartCtrl', ['$scope', '$http', '$filter', '$mdDialog', function($scope, $http, $filter, $mdDialog){

  $scope.urlIndex = '../../';
  $scope.urlResource = '../../cart';
  $scope.urlResourceSales = '../../ventas';

  $scope.setInitValues = () => {
    $scope.venta.vtn_subtotal = 0;
    $scope.venta.vtn_total = 0;

    $scope.productos.map((producto) => {
      $scope.venta.vtn_subtotal += producto.dll_subtotal;
      $scope.venta.vtn_total += producto.dll_total;
    });
  }

  $scope.confirmarVenta = (estado) => {

    $scope.objeto = {};
    $scope.objeto.estado = estado;
    $scope.objeto.subtotal = $scope.venta.vtn_subtotal;
    $scope.objeto.total = $scope.venta.vtn_total;

    $http.put(`${$scope.urlResourceSales}/${$scope.venta.id}`, $scope.objeto).then(response => {
      if(estado == 'Confirmada'){
        window.location.reload();
      }else{
        window.location = $scope.urlIndex;
      }
    });
  }

  $scope.deleteItem = (product, ev) => {
    var confirm = $mdDialog.confirm()
         .title('Realmente desea eliminar este item del carrito ?')
         .textContent('Sí desea registrarlo nuevamente debera volver a seleccionar la cantidad deseada.')
         .ariaLabel('RemoveItem')
         .targetEvent(ev)
         .ok('Si, deseo eliminarlo')
         .cancel('Cancelar');

   $mdDialog.show(confirm).then(function() {
     $http.delete(`${$scope.urlResource}/${product.id}`).then(response => {
       window.location.reload();
     });
   }, function() {

   });
  }

}]);
