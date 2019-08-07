app.controller('productosCtrl', ['$scope', '$http', '$filter', '$mdDialog', function($scope, $http, $filter, $mdDialog){

  $scope.urlResource = 'cart';
  $scope.urlIndex = '/';

  $scope.setInitValues = () =>{
    $scope.productos.map(producto => {
      producto.producto_to_add = {};
      producto.producto_to_add.dll_cantidad = 1;
    })
  }

  $scope.addToProduct = (product) =>{
    product.producto_to_add.dll_cantidad ++;
  }

  $scope.removeFromProduct = (product) =>{
    product.producto_to_add.dll_cantidad = product.producto_to_add.dll_cantidad == 1 ? 1 : (product.producto_to_add.dll_cantidad - 1);
  }

  $scope.addToCart = (product, ev) => {

    let objeto = {};
    objeto.producto = product;
    objeto.producto_to_add = angular.copy(product.producto_to_add);
    objeto.producto_to_add.dll_venta = $scope.ventaAbierta.id;
    objeto.producto_to_add.dll_producto = product.id;
    
    $http.post($scope.urlResource, objeto).then(detail => {
      console.log(detail);
      $mdDialog.show(
        $mdDialog.alert()
          .parent(angular.element(document.body))
          .clickOutsideToClose(false)
          .title('Se ha añadido un producto')
          .textContent(`Se añadio el producto ${product.prd_nombreproducto} al carrito de compra`)
          .ariaLabel('AddProduct')
          .ok('Continuar')
          .targetEvent(ev)
      ).then(()=>{
        window.location = $scope.urlIndex;
      });
    });
  }

}]);
