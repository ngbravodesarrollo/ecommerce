<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\User;
use Illuminate\Support\Facades\Redirect;
use Ecommerce\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class UsuarioController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(Request $request){
    	if($request){
    		$query= trim($request->get('searchText'));
    		$usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
    		->orderBy('id','desc')
    		->paginate(7);
    		return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("seguridad.usuario.create");
    }
    public function store(UsuarioFormRequest $request){
    	$usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
    	$usuario->save();
    	return Redirect::to('seguridad/usuario');
    }
    public function edit($id){
        $url = url()->current();
        if (str_contains($url,'seguridad')) {            
            return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
        }
        else{
            return view("datos.usuario.edit",["usuario"=>User::findOrFail(Auth::user()->id)]);
        }
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:6|confirmed',
        ]);

        if (str_contains(url()->current(),'datos')) {            
           $id=Auth::user()->id;
        }

    	$usuario=User::findOrFail($id);
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
        if ($request->has('password')) {
            $usuario->passwor=$bcrypt($request->get('password'));
        }
    	$usuario->update();

        if (str_contains(url()->current(),'seguridad')) {            
            return Redirect::to('seguridad/usuario');
        }
        else{
    	   return Redirect::to('datos/personales');
        }
    }
    public function destroyd($id){
    	$usuario= DB::table('users')->where('id','=',$id)->delete();
    	return Redirect::to('seguridad/usuario');
    }
   

    public function editpass($id){      
        return view("datos.usuario.editpass",["usuario"=>User::findOrFail(Auth::user()->id)]);
    }   
    public function updatepass(Request $request){
        Validator::extend('pwdvalidation', function($field, $value, $parameters)
        {
            return Hash::check($value, Auth::user()->password);
        });

        $this->validate($request,[
            'old-password' => 'required|pwdvalidation',
            'password' => 'required|confirmed|min:6|max:50|different:old-password',
        ],['pwdvalidation'=>'contraseña invalida']);

        $usuario=User::findOrFail(Auth::user()->id);
        $usuario->password= Hash::make($request->get('password'));
        
        $usuario->update();


        return Redirect::to('datos/personales');
    }
}
