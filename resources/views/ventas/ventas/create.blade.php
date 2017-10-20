@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Venta</h3>
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
	{!!Form::open(array('url'=>'ventas/ventas','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
	        	<label for="cliente">Cliente</label>
	        	<select name='idcliente' id='idcliente' class="form-control">
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
							<option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_venta}}">{{$articulo->articulo}}</option>
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
						<label for="stock">Stock</label>
						<input type="number" disabled name="pstock" class="form-control"  id="pstock" placeholder="Stock">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_venta">Precio de Venta</label>
						<input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. de Venta">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="descuento">Descuento</label>
						<input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">
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
								<th><h4 id="total">$/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
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

<link rel="stylesheet" href="css/catalogo.css">
<script type="text/javascript">
	var cont=0;
	var total=0;
	var subtotal=[];

	$(document).ready(function(){
		mostrarValores();
		$("#pidarticulo").change(mostrarValores);
		$("#bt_add").attr("onclick","agregar()");
		
		evaluar();
	});

	function mostrarValores(){
		var datosArticulo=$("#pidarticulo").val().split("_");
		$("#pprecio_venta").val(datosArticulo[2]);
		$("#pstock").val(datosArticulo[1]);
	}

	function limpiar(){
		$("#pcantidad").val("");
		$("#pprecio_venta").val("");
		$("#pdescuento").val("");
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
		var datosArticulo=$("#pidarticulo").val().split('_');
		var idarticulo=datosArticulo[0];
		var articulo= $("#pidarticulo option:selected").text();
		var cantidad=$("#pcantidad").val();
		var descuento=$("#pdescuento").val();
		var precio_venta=$("#pprecio_venta").val();
		var stock=$("#pstock").val();

		if(idarticulo != "" && cantidad !="" && cantidad >0 && descuento !="" && precio_venta != ""){
			subtotal[cont]=(cantidad*precio_venta-descuento);
			total+= subtotal[cont];
			if (stock>=cantidad) {
				var fila='<tr class="selected" id="fila' +cont + '">'+
				'<td><button class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>'+
				'<td><input type="hidden" name="idarticulo[]" value="' +idarticulo+ '">'+articulo+ '</td>'+
				'<td><input type="hidden" name="cantidad[]"  value="'+cantidad+'">'+cantidad+'</td>'+
				'<td><input type="hidden"  name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td>'+
				'<td><input type="hidden"  name="descuento[]" value="'+descuento+'">'+descuento+'</td>'+
				'<td>'+subtotal[cont] +'</td></tr>';
				cont++;
				limpiar();
				$("#total").html("$/. "+total);
				$("#total_venta").val(total);
				evaluar();

				$("#detalles").append(fila);
			}
			else{
				alert("La cantidad a vender supera al stock")
			}
		}
		else{
			alert("Error al ingresar el detalle de la venta, revise los daos del articulo");
		}
	}

	function eliminar(index){
		tota= total-subtotal[index];
		$("#total").html("$/. "+ total);
		$("#total_venta").val(total);
		$("#fila"+index).remove();
		evaluar();
	}
</script>
@endpush
@endsection