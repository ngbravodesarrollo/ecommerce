@extends('layouts.app')
@section('content')
<div  class="row" style="padding-left: 10%;padding-top: 20px; margin-bottom: 50px;">

@isset($productos)
{!!Form::open(array('url'=>'carrito/action/mercadopago','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
		<table style="width:1000px" class="table">
			<thead>
				<tr>
					<th>Cod.</th>
					<th colspan="2">Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
					<tr>
					  <td>
					  	<input type="hidden" name="ids[]" value="a">
					  	a
					  </td>
					  <td>
					  	b
					  </td>
					  <td>
					  	<img src="{{ asset('img/articulos/dije4.jpg') }}" alt="a" height="100px" width="100px" class="img-thumbnail">
					  </td>
					  <td>
					  	<input style="width:100px;" type="number" name="stocks[]" value="3">
					  </td>
					  <td>
					  	15
					  </td>
					</tr>
			</tbody>
			<tfoot>
				<th><a href="#">Vaciar carrito</a></th>
				<th><a href="#">Volver a la tienda</a></th>
				<th><button>Concluir Compra</button></th>
			</tfoot>
		</table>	
	{!!Form::close()!!}	
@endisset
@empty($productos)
	No hay productos
@endempty
	</div>
	<section class="row ">
		<h2 class="titulo">TAMBIÉN TE PUEDE INTERESAR</h2>
		<div class="flexslider content-slider-catalogo">
			<!-- esto es dinamico -->
			<div class="slider-menu">
				<ul class="slides">
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije4.jpg')}}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije5.jpg')}}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije6.jpg') }}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije4.jpg')}}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije5.jpg')}}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije6.jpg') }}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije4.jpg')}}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
					<li>
						<a href="#">
							<img src="{{ asset('img/articulos/dije5.jpg')}}">
							<div class="flex-caption">
								<p class="description">Nombre del Producto</p>
								<p class="description">$Precio</p>
							</div>
						</a>
						<div class="flex-caption">
							<button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
						</div>
					</li>
				</ul>		
			</div><!-- /.slider-actions -->							
		</div>	
	</section>
</div>

@push('scripts')
	<link rel="stylesheet" href="css/catalogo.css">
	<script type="text/javascript" src="{{asset('js/app/categorias/check-list.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/app/productos/productos-list.components.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/efectcards.js')}}"></script>
@endpush
@endsection
