app.controller('ventasCtrl', ['$scope', '$http', '$filter', '$mdDialog', function($scope, $http, $filter, $mdDialog){

  $scope.urlResource = 'ventas';
  $scope.urlIndex = '/';
  $scope.venta = {};

  $scope.saveSale = () => {
    $http.post($scope.urlResource, $scope.venta).then((venta) => {
      console.log(venta);
      window.location = $scope.urlIndex;
    });
  }

}]);
