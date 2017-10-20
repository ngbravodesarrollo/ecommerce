@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Colecciones <a href="colecciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.colecciones.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Opciones</th>
				</thead>
               @foreach ($colecciones as $colec)
				<tr>
					<td>{{ $colec->idcoleccion}}</td>
					<td>{{ $colec->nombre}}</td>
					<td>{{ $colec->descripcion}}</td>
					<td>
						<a href="{{URL::action('ColeccionController@edit',$colec->idcoleccion)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$colec->idcoleccion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.colecciones.modal')
				@endforeach
			</table>
		</div>
		{{$colecciones->render()}}
	</div>
</div>

@endsection