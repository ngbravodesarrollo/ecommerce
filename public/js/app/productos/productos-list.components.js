
todoApp.controller('ProductosListCtrl',[ '$scope', function ProductosListCtrl($scope){
		
		$scope.addShopping = function ($id,$cant){
		var item={
			'id':$id,
			'cant' : $cant
		};
		$scope.shopping.push(item);
	}
	}]);