@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo proveedor</h3>
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
	{!!Form::open(array('url'=>'compras/proveedores','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="idusuario">Usuario</label>
        	<select name='idusuario' id='idusuario' class="form-control">
        		@foreach($users as $user)
        			<option value="{{ $user->id }}">{{ $user->email }}</option>
        		@endforeach
	        </select>
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="nombre" required value="{{ old('nombre') }}" class="form-control" placeholder="Nombre...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="apellido">Apellido</label>
        	<input type="text" name="apellido" required value="{{ old('apellido') }}" class="form-control" placeholder="Apellido...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
        	<input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Teléfono...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="localidad">Localidad</label>
        	<input type="text" name="localidad" required value="{{ old('localidad') }}" class="form-control" placeholder="Localidad...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="partido">Partido</label>
        	<input type="text" name="partido" required value="{{ old('partido') }}" class="form-control" placeholder="Partido...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="calle">Calle</label>
        	<input type="text" name="calle" required value="{{ old('calle') }}" class="form-control" placeholder="Calle...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="numero">Número</label>
        	<input type="number" name="numero" required value="{{ old('numero') }}" class="form-control" placeholder="Número...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="piso">Piso/Dep</label>
        	<input type="number" name="piso" value="{{ old('piso') }}" class="form-control" placeholder="Piso/Dep...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="cod_postal">Codigo Postal</label>
        	<input type="number" name="cod_postal" required value="{{ old('cod_postal') }}" class="form-control" placeholder="Codigo Postal...">
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