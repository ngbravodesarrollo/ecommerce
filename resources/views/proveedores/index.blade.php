@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de proveedores <a href="proveedores/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.proveedores.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Teléfono</th>
					<th>Localidad</th>
					<th>Partido</th>
					<th>Calle</th>
					<th>Número</th>
					<th>Piso/Dep</th>
					<th>C.P.</th>
					<th>Opciones</th>
				</thead>
               @foreach ($personas as $per)
				<tr>
					<td>{{ $per->nombre}}</td>
					<td>{{ $per->apellido}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->localidad}}</td>
					<td>{{ $per->partido}}</td>
					<td>{{ $per->calle}}</td>
					<td>{{ $per->numero}}</td>
					<td>{{ $per->piso}}</td>
					<td>{{ $per->cod_postal}}</td>
					<td>
						<a href="{{URL::action('ProveedorController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>				
				@include('compras.proveedores.modal')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection