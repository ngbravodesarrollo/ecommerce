@extends ('layouts.app')
@section ('content')
<section class="scrolling">
	<div>
		<h1>Noray Joyas</h1>
	</div>
</section>	
<section class="categorias">
	<h2 class="titulo">Lo mas buscado</h2>
	<div class="flexslider content-slider-catalogo">
		<!-- esto es dinamico -->
		<div class="slider-menu">
			<ul class="slides">
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Anillos</span>
						</div>
						<img src="./img/sliderMenu/dije4.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Aros</span>
						</div>
						<img src="./img/sliderMenu/dije5.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Cadenas</span>
						</div>
						<img src="./img/sliderMenu/dije6.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Dijes</span>
						</div>
						<img src="./img/sliderMenu/dije4.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Donas</span>
						</div>
						<img src="./img/sliderMenu/dije5.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Esclavas</span>
						</div>
						<img src="./img/sliderMenu/dije4.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Pulseras</span>
						</div>
						<img src="./img/sliderMenu/dije6.jpg">
					</a>
				</li>
				<li>
					<a href="#">
						<div class="flex-caption">
							<span class="description">Tobilleras</span>
						</div>
						<img src="./img/sliderMenu/dije5.jpg">
					</a>
				</li>
			</ul>		
		</div><!-- /.slider-actions -->							
	</div>	
</section>
<section class="menor-y-mayor">
		<div class="menor">
			<div><p>Por menor</p></div>
		</div>
		<div class="mayor" >
			<div><p>Por mayor</p></div>	
		</div>
</section>
<section class="lo-nuevo">
	<h2 class="titulo">Lo nuevo</h2>
	<div class="flexslider content-slider-catalogo">
		<!-- esto es dinamico -->
		<div class="slider-menu">
			<ul class="slides">
				<li>
					<a href="#">
						<img src="./img/sliderMenu/dije4.jpg">
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
						<img src="./img/sliderMenu/dije5.jpg">
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
						<img src="./img/sliderMenu/dije6.jpg">
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
						<img src="./img/sliderMenu/dije4.jpg">
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
						<img src="./img/sliderMenu/dije5.jpg">
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
						<img src="./img/sliderMenu/dije4.jpg">
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
						<img src="./img/sliderMenu/dije6.jpg">
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
						<img src="./img/sliderMenu/dije5.jpg">
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
@endsection