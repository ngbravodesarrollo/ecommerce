@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Metales<a href="metales/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.metales.search')
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
               @foreach ($metales as $met)
				<tr>
					<td>{{ $met->idmetal}}</td>
					<td>{{ $met->nombre}}</td>
					<td>{{ $met->descripcion}}</td>
					<td>
						<a href="{{URL::action('MetalController@edit',$met->idmetal)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$met->idmetal}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.metales.modal')
				@endforeach
			</table>
		</div>
		{{$metales->render()}}
	</div>
</div>

@endsection