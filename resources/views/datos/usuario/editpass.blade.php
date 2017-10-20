@extends ('layouts.app')
@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Cambiar Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif                  
                    {!!Form::model($usuario,['class'=>'form-horizontal', 'method'=>'PATCH','route'=>['usuario.pass.update',$usuario->id]])!!}
                    {{Form::token()}}
                        <div class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
                            <label for="old-password" class="col-md-4 control-label">Contraseña Actual</label>
                            <div class="col-md-6">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input id="old-password" type="password" class="form-control" name="old-password" required>
                                @if ($errors->has('old-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Contraseña
                                </button>
                                <a href="{{ URL::previous() }}">
                                <button type="button" class="btn btn-danger">
                                    Cancelar
                                </button>
                                </a>
                            </div>
                        </div>
            {!!Form::close()!!}     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
