@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso</h3>
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
	{!!Form::open(array('url'=>'compras/ingresos','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    
    <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
	        	<label for="proveedor">Proveedor</label>
	        	<select name='idproveedor' id='idproveedor' class="form-control">
	        		@foreach($personas as $persona)
	        			<option value="{{ $persona->idpersona }}">{{ $persona->nombre }}</option>
	        		@endforeach
	        	</select>
	        </div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="tipo_comprobante">Tipo Comprobante</label>
				<select name="tipo_comprobante" class="form-control">
					<option value="Boleta">Boleta</option>
					<option value="Factura">Factura</option>
					<option value="Tickect">Tickect</option>
				</select>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Serie Comprobante</label>
	        	<input type="number" name="serie_comprobante" required value="{{ old('serie_comprobante') }}" class="form-control" placeholder="Serie Comprobante...">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="num_comprobante">Número Comprobante</label>
	        	<input type="text" name="num_comprobante" required value="{{ old('num_comprobante') }}" class="form-control" placeholder="Número Comprobante...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="idarticulo">Artículo</label>
						<select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
							@foreach($articulos as $articulo)
							<option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="number" name="pcantidad" class="form-control"  id="pcantidad" placeholder="Cantidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_compra">Precio de Compra</label>
						<input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="P. de Compra">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_venta">Precio de Venta</label>
						<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. de Venta">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" class="btn btn">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<table id="detalles" class="table table-striped table-bordered table-hover">
							<thead style="background-color: #A9D0F5">
								<th>Opciones</th>
								<th>Artículo</th>
								<th>Cantidad</th>
								<th>Precio Compra</th>
								<th>Precio Venta</th>
								<th>Subtotal</th>
							</thead>
							<tfoot>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th>TOTAL</th>
								<th><h4 id="total">$/. 0.00</h4></th>
							</tfoot>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div id="guardar" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input name="token" type="hidden" name="{{ csrf_token() }}">
	        	<button class="btn btn-primary" id="btn-salvar" type="submit">Guardar</button>
	        	<button class="btn btn-danger" type="reset">Cancelar</button>
	        </div>
		</div>
	</div>
	{!!Form::close()!!}		
 
@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){

		$("#bt_add").attr("onclick","agregar()");
		evaluar();
	});

	var cont=0;
	var total=0;
	var subtotal=[];
	function limpiar(){
		$("#pcantidad").val("");
		$("#pprecio_venta").val("");
		$("#pprecio_compra").val("");
	}

	function evaluar(){
		if (total>0) {
			$("#guardar").show();
		}
		else{
			$("#guardar").hide()
		}
	}
	function agregar(){
		var idarticulo=$("#pidarticulo").val();
		var articulo= $("#pidarticulo option:selected").text();
		var cantidad=$("#pcantidad").val();
		var precio_compra=$("#pprecio_compra").val();
		var precio_venta=$("#pprecio_venta").val();

		if(idarticulo != "" && cantidad !="" && cantidad >0 && precio_compra !="" && precio_venta != ""){
			subtotal[cont]=(cantidad*precio_compra);
			total+= subtotal[cont];

			var fila='<tr class="selected" id="fila' +cont + '">'+
			'<td><button class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>'+
			'<td><input type="hidden" name="idarticulo[]" value="' +idarticulo+ '">'+articulo+ '</td>'+
			'<td><input type="hidden" name="cantidad[]"  value="'+cantidad+'">'+cantidad+'</td>'+
			'<td><input type="hidden"  name="precio_compra[]" value="'+precio_compra+'">'+precio_compra+'</td>'+
			'<td><input type="hidden"  name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td>'+
			'<td>'+subtotal[cont] +'</td></tr>';
			cont++;
			limpiar();
			$("#total").html("$/. "+total);
			evaluar();

			$("#detalles").append(fila);
		}
		else{
			alert("Error al ingresar el detalle del ingreo, revise los daos del articulo");
		}
	}

	function eliminar(index){
		tota= total-subtotal[index];
		$("#total").html("$/. "+ total);
		$("#fila"+index).remove();
		evaluar();
	}
</script>
@endpush
@endsection