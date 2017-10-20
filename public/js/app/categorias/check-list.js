todoApp.controller('CategoriasFiltro',['$scope','filterFilter','datosGet',function CategoriasFiltro($scope,filterFilter,datosGet) {
  cargarCategorias();

  function cargarCategorias(){
    datosGet.categorias .success(function (categorias) {
          $scope.categoriasCheck = categorias;
      })
      .error(function (error) {
          $scope.status = 'Unable to load customer data: ' + error.message;
    });
  
 }
  this.selection= [];
  $scope.selectedCategorias=[];
// Helper method to get selected categorias
  $scope.selectedCategorias = function selectedCategorias() {
    return filterFilter($scope.categoriasCheck, { selected: true });
  };

  // aca pongo lo que guardo
  $scope.$watch('categorias|filter:{selected:true}', function (nv) {
    this.selection = nv.map(function (categoria) {
      return categoria;
    });
  }, true);
}]);