@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente: {{ $persona->nombre}}</h3>
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
{!!Form::model($persona,['method'=>'PATCH','route'=>['clientes.update',$persona->idpersona]])!!}
{{Form::token()}}
<div class="row">
	<input type="hidden" name="idusuario" value="{{ $persona->idusuario }}">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="nombre" required value="{{ $persona->nombre }}" class="form-control" placeholder="Nombre...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="apellido">Apellido</label>
        	<input type="text" name="apellido" required value="{{ $persona->apellido }}" class="form-control" placeholder="Apellido...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
        	<input type="text" name="telefono" required value="{{ $persona->telefono }}" class="form-control" placeholder="Teléfono...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="localidad">Localidad</label>
        	<input type="text" name="localidad" required value="{{ $persona->localidad }}" class="form-control" placeholder="Localidad...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="partido">Partido</label>
        	<input type="text" name="partido" required value="{{ $persona->partido }}" class="form-control" placeholder="Partido...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="calle">Calle</label>
        	<input type="text" name="calle" required value="{{ $persona->calle }}" class="form-control" placeholder="Calle...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="numero">Número</label>
        	<input type="number" name="numero" required value="{{ $persona->numero }}" class="form-control" placeholder="Número...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="piso">Piso/Dep</label>
        	<input type="text" name="piso" value="{{ $persona->piso }}" class="form-control" placeholder="Piso/Dep...">
        </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
        	<label for="cod_postal">Codigo Postal</label>
        	<input type="number" name="cod_postal" required value="{{ $persona->cod_postal }}" class="form-control" placeholder="Codigo Postal...">
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