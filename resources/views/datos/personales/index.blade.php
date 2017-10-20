@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Datos pesonales y usuario</div>
                <div class="panel-body">          
                    <div class="row" style="display: flex;align-items: stretch;">
						<div class="col-md-7 ">
                            <div class="row" >
                                <div class="form-group col-md-6">
						        	<label for="nombre">Nombre</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->nombre}}" readonly>
						        </div>
                                <div class="form-group col-md-6">
						        	<label for="apellido">Apellido</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->apellido}}" readonly>
						        </div>
                            </div>                            
                            <div class="row">
                                <div class="form-group col-md-8">
						        	<label for="telefono">Telefono</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->telefono}}" readonly>
						        </div>
                                <div class="form-group col-md-4">
						        	<label for="cod_postal">Codigo Postal</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->cod_postal}}" readonly>
						        </div>
                            </div> 
                            <div class="row">                           
                                <div class="form-group col-md-6">
						        	<label for="calle">Calle</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->calle}}" readonly>
						        </div>
                                <div class="form-group col-md-3">
						        	<label for="numero">Númerol</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->numero}}" readonly>
						        </div>
                                <div class="form-group col-md-3">
						        	<label for="piso">Piso/Dep</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->piso}}" readonly>
						        </div>
                            </div>
                            <div class="form-group">
						        	<label for="partido">Partido</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->partido}}" readonly>
						    </div>
                            <div class="form-group">
						        	<label for="localidad">Localidad</label>
						        	<input class="form-control" type="text" placeholder="{{$persona->localidad}}" readonly>
						    </div>
                        </div>
                        <div class="col-md-5" style="display: flex;justify-content: space-between;flex-direction: column;">
                        	<div>
	                            <div class="form-group">
							        	<label for="name">Usuario</label>
							        	<input class="form-control" type="text" placeholder="{{Auth::user()->name}}" readonly>
							    </div>
	                            <div class="form-group">
							        	<label for="email">Email</label>
							        	<input class="form-control" type="text" placeholder="{{Auth::user()->email}}" readonly>
							    </div>
						    </div>
                            <br/>
                            <br/>
                            <div>
	                            <div class="form-group">
	                                	<input type="button" class="btn btn-primary" onclick="window.location.href='{{url("datos/usuario/" .Auth::user()->id ."/editpass")}}';" name="change-password" value="Cambiar password">
	                            </div>
	                            <div class="form-group">
	                                <a href="{{URL::action('DatosPersonalesController@edit',$persona->nombre)}}"><input type="button" class="btn btn-primary" name="change-password" value="Cambiar datos personales"></a>
	                            </div>
	                            <div class="form-group">
	                            	<a href="{{url("datos/usuario/" .Auth::user()->id ."/edit")}}">
	                                	<input type="button" class="btn btn-primary" name="change-password" value="Cambiar datos de cuenta">
	                           		</a>
	                            </div>
	                            <div class="form-group">
	                                <input type="button" class="btn btn-danger" onclick="window.location.href='{{ url('/logout') }}'" name="change-password" value="Cerrar sesión">
	                            </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
