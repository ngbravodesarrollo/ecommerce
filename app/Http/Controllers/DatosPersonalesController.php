<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Ecommerce\User;
use Ecommerce\Persona;
use Ecommerce\Http\Requests\PersonaFormRequest;

class DatosPersonalesController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$persona = Persona::where('idusuario',Auth::id())->first();
    	return view("datos.personales.index",["persona"=>$persona]);
    }

    public function create(){
    	return view("welcome");
    }
    public function store(PersonaFormRequest $request){
    	return Redirect::to('datos/personales');
    }
    public function edit($id){
    	$persona = Persona::where('idusuario',Auth::id())->first();
    	return view("datos.personales.edit",["persona"=>$persona]);
    }
    public function update(PersonaFormRequest $request, $id){
    	
    	$persona = Persona::findOrFail($id);

        $persona->idusuario=$request->get('idusuario');
        $persona->tipo_persona='Cliente';
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        if ($request->exists('telefono')) {
            $persona->telefono=$request->get('telefono');
        }
        else{
            $persona->telefono="";
        }
        $persona->cod_postal=$request->get('cod_postal');
        $persona->calle=$request->get('calle');
        $persona->numero=$request->get('numero');
        if ($request->exists('piso')) {
            $persona->piso=$request->get('piso');
        }
        else{
             $persona->piso="";
        }
        $persona->localidad=$request->get('localidad');
        $persona->partido=$request->get('partido');
    	$persona->update();

    	return Redirect::to('datos/personales');
    }
    public function destroyd($id){
    	return Redirect::to('datos/personales');
    }
}
