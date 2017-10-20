var todoApp=angular.module('todoApp',[]);

todoApp.controller('AppCtrl',function AppCtrol($scope){
	var $shopping=[];
	$scope.shopping=$shopping;

	$http.get('')
	$scope.addShopping = function ($id,$cant){
		var item={
			'id':$id,
			'cant' : $cant
		};
		$scope.shopping.push(item)
	}
});