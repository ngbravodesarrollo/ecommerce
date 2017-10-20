@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Artículo: {{ $articulo->nombre}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
{!!Form::model($articulo,['method'=>'PATCH','files'=>'true','route'=>['articulos.update',$articulo->idarticulo]])!!}
{{Form::token()}}
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
	    	<label for="nombre">Nombre</label>
	    	<input type="text" name="nombre" required value="{{ $articulo->nombre }}" class="form-control" placeholder="Nombre...">
	    </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Categoría</label>
			<select name="idcategoria" class="form-control">	
				@foreach($categorias as $cat)
					@if ($cat->idcategoria == $articulo->idcategoria)
					<option value="{{ $cat->idcategoria }}" selected>{{ $cat->nombre }}</option>
					@else
					<option value="{{ $cat->idcategoria }}">{{ $cat->nombre }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Metales</label>
			<select name="idmetal" class="form-control">
				<option value="-1">(Ninguno)</option>
				@foreach($metales as $met)
					@if ($met->idmetal == $articulo->idmetal)
					<option value="{{ $met->idmetal }}" selected>{{ $met->nombre }}</option>
					@else
					<option value="{{ $met->idmetal }}">{{ $met->nombre }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Colecciones</label>
			<select name="idcoleccion" class="form-control">		
				<option value="-1">(Ninguno)</option>
				@foreach($colecciones as $col)
					@if ($col->idcoleccion == $articulo->idcoleccion)
					<option value="{{ $col->idcoleccion }}" selected>{{ $col->nombre }}</option>
					@else
					<option value="{{ $col->idcoleccion }}">{{ $col->nombre }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="codigo">Código</label>
	    	<input type="text" name="codigo" required value="{{ $articulo->codigo }}" class="form-control" placeholder="Código...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="stock">Stock</label>
	    	<input type="text" name="stock" required value="{{ $articulo->stock }}" class="form-control" placeholder="Stock del articulo...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripción</label>
	    	<input type="text" name="descripcion" value="{{ $articulo->descripcion }}" class="form-control" placeholder="Descripción del articulo...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="imagen">Imagen</label>
	    	<input type="file" name="imagen" class="form-control" >
	    	@if(($articulo->imagen) != "")
	    		<img src="{{ asset('img/articulos/'.$articulo->imagen) }}" height="300px" width="300px" >
	    	@endif
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
	    	<button class="btn btn-primary" type="submit">Guardar</button>
	    	<button class="btn btn-danger" type="reset">Cancelar</button>
	    </div>
	</div>
</div>

{!!Form::close()!!}		
        
@endsection