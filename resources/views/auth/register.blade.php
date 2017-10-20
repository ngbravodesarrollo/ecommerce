@extends('layouts.tienda')

@section('content')
<div class="container">
    <div class="row">
        <div style="float:none !important;" class="col-md-10 col-md-offset-2 center-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-7">Datos Personales</div>
                        <div class="col-md-5">Sobre Tu Cuenta</div>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="row" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-gruop col-md-7 ">
                            <div class="row">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                    <label for="name" class="control-label">Nombre</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }} col-md-6">
                                    <label for="lastName" class="control-label">Apellido</label>
                                        <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required>

                                        @if ($errors->has('lastName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-8">
                                    <label for="telefono" class="control-label">Telefono</label>
                                    <input id="telefono" type="number" class="form-control" name="telefono" value="{{ old('telefono') }}">
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }} col-md-4">
                                    <label for="cp" class="control-label">Codigo Postal</label>
                                    <input id="cp" type="number" class="form-control" name="cp" value="{{ old('cp') }}" required>
                                    @if ($errors->has('cp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> 
                            <div class="row">                           
                                <div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }} col-md-6">
                                    <label for="calle" class="control-label">Calle</label>
                                        <input id="calle" type="text" class="form-control" name="calle" value="{{ old('calle') }}" required>
                                        @if ($errors->has('calle'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('calle') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }} col-md-3">
                                    <label for="numero" class="control-label">Número</label>
                                        <input id="numero" type="number" class="form-control" name="numero" value="{{ old('numero') }}" required>

                                        @if ($errors->has('numero'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('piso') ? ' has-error' : '' }} col-md-3">
                                    <label for="piso" class="control-label">Piso/Dep</label>
                                        <input id="piso" type="text" class="form-control" name="piso" value="{{ old('piso') }}">

                                        @if ($errors->has('piso'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('piso') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('partido') ? ' has-error' : '' }} ">
                                <label for="partido" class="control-label">Partido</label>
                                    <input id="partido" type="text" class="form-control" name="partido" value="{{ old('partido') }}" required>

                                    @if ($errors->has('partido'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('partido') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }} ">
                                <label for="provincia" class="control-label">Provincia</label>
                                    <input id="provincia" type="text" class="form-control" name="provincia" value="{{ old('provincia') }}" required>

                                    @if ($errors->has('provincia'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('provincia') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('localidad') ? ' has-error' : '' }} ">
                                <label for="localidad" class="control-label">Localidad</label>
                                    <input id="localidad" type="text" class="form-control" name="localidad" value="{{ old('localidad') }}" required>

                                    @if ($errors->has('localidad'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('localidad') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
