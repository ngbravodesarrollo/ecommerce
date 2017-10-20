//var services=angular.module('datosServices',[]);

todoApp.factory('datosGet',function($http){

	var datosGet={};
	var url="";
	datosGet.productos= function(){ 
		$http.get(url+'articulos').then(function (response){
			$scope.productos = response.data.data;
		});
	};

	datosGet.categorias= function(){
		$http.get(url +'categorias').then(function (response){
    	  for (var i = 0; i < response.data.length; i++) {
       	 response.data[i]["selected"]='false';
      	}
        return response.data;
    	});
	};

	return datosGet;
});