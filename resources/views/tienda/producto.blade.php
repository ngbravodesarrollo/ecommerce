@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row" style="min-width: 1300px; max-width: auto;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<div class="row  center-block ">
			<div class="panel panel-default " style="background-color: white; margin-top: 14; padding: 15px; width: 100%;">
				<div ng-controller="CategoriasFiltro" class="categorias "> 
					<h3>Categorias</h2>
					<div class="form-check" ng-repeat="categoria in categorias"> 
						<label class="form-check-label">
							<input  class="form-check-input" type="checkbox" name="selectedCategorias[]" value="@{{categoria.nombre}}" ng-model="categoria.selected"> @{{categoria.nombre}}
						</label>
					</div>
				</div>
				<br />
				<div ng-controller="CategoriasFiltro" class="categorias "> 
					<h3>Metal</h2>
					<div class="form-check" ng-repeat="categoria in categorias"> 
						<label class="form-check-label">
							<input  class="form-check-input" type="checkbox" name="selectedCategorias[]" value="@{{categoria.nombre}}" ng-model="categoria.selected"> @{{categoria.nombre}}
						</label>
					</div>
				</div>
				<div class="precios">
					<h3>Valor</h3>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="price[]" value="100"> $100
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="price[]" value="100 a 200"> $100 a $200
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="price[]" value="200 a 300"> $200 a 300
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="price[]" value="300 a 400"> $300 a 400
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="price[]" value="400 a 500"> $400 a 500
						</label>
					</div>					
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="price[]" value="500 a 1000"> $500 a 1000
						</label>
					</div>
				</div>
				<br />
				<div ng-controller="CategoriasFiltro" class="categorias "> 
					<h3>Collecciones</h2>
					<div class="form-check" ng-repeat="categoria in categorias"> 
						<label class="form-check-label">
							<input  class="form-check-input" type="checkbox" name="selectedCategorias[]" value="@{{categoria.nombre}}" ng-model="categoria.selected"> @{{categoria.nombre}}
						</label>
					</div>
				</div>				
			</div>			
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
			<div ng-controller="ProductosListCtrl"  class='row'>
			  <div ng-repeat="producto in productos" class='product--blue'>
			    <div class='product_inner' >
			      <img ng-src='http://carrito.app/img/articulos/@{{producto.imagen}}' alt="@{{producto.name}}" width='300'>
			      <p>@{{producto.nombre}}</p>
			      <p>Precio @{{producto.precio_venta}} </p>
			      <button class="addShop" onclick="addShop(this)" ng-click="addShopping(producto.idarticulo,1)">Add to basket</button>
			    </div>
			    <div class='product_overlay'>
			      <h2>Agregado al carrito</h2>
			      <i class='fa fa-check'></i>
			    </div>
			  </div>  
			</div>			
		</div>			
	</div>
</div>
@push('scripts')
	<link rel="stylesheet" href="css/catalogo.css">
	<script type="text/javascript" src="{{asset('js/app/categorias/check-list.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/app/productos/productos-list.components.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/efectcards.js')}}"></script>
@endpush
@endsection
