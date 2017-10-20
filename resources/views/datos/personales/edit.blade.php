@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Datos pesonales</div>
                <div class="panel-body">
                    @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
            {!!Form::model($persona,['method'=>'PATCH','route'=>['personales.update',$persona->idpersona]])!!}
			{{Form::token()}}
                            <input type="hidden" name="idusuario" value="{{Auth::user()->id}}">        
                            <div class="row">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                                    <label for="nombre" class="control-label">Nombre</label>
                                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $persona->nombre }}" required autofocus>

                                        @if ($errors->has('nombre'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }} col-md-6">
                                    <label for="apellido" class="control-label">Apellido</label>
                                        <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $persona->apellido }}" required>

                                        @if ($errors->has('apellido'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('apellido') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-8">
                                    <label for="telefono" class="control-label">Telefono</label>
                                    <input id="telefono" type="number" class="form-control" name="telefono" value="{{ $persona->telefono }}">
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('cod_postal') ? ' has-error' : '' }} col-md-4">
                                    <label for="cod_postal" class="control-label">Codigo Postal</label>
                                    <input id="cod_postal" type="number" class="form-control" name="cod_postal" value="{{ $persona->cod_postal }}" required>
                                    @if ($errors->has('cod_postal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cod_postal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }} col-md-6">
                                    <label for="calle" class="control-label">Calle</label>
                                        <input id="calle" type="text" class="form-control" name="calle" value="{{ $persona->calle }}" required>
                                        @if ($errors->has('calle'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('calle') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }} col-md-3">
                                    <label for="numero" class="control-label">Número</label>
                                        <input id="numero" type="number" class="form-control" name="numero" value="{{ $persona->numero }}" required>

                                        @if ($errors->has('numero'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('piso') ? ' has-error' : '' }} col-md-3">
                                    <label for="piso" class="control-label">Piso/Dep</label>
                                        <input id="piso" type="text" class="form-control" name="piso" value="{{ $persona->piso }}">

                                        @if ($errors->has('piso'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('piso') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('partido') ? ' has-error' : '' }} ">
                                <label for="partido" class="control-label">Partido</label>
                                    <input id="partido" type="text" class="form-control" name="partido" value="{{ $persona->partido }}" required>

                                    @if ($errors->has('partido'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('partido') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('localidad') ? ' has-error' : '' }} ">
                                <label for="localidad" class="control-label">Localidad</label>
                                    <input id="localidad" type="text" class="form-control" name="localidad" value="{{ $persona->localidad }}" required>

                                    @if ($errors->has('localidad'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('localidad') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="row">
							    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
								    	<button class="btn btn-primary" type="submit">Guardar</button>
								    	<a href="{{ URL::previous() }}">
                                           <button class="btn btn-danger" type="buttom">Cancelar</button>
                                        </a>
								    </div>
								</div>
							</div>
			{!!Form::close()!!}		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
