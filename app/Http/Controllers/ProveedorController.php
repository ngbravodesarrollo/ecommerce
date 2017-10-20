<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Ecommerce\Persona;
use Ecommerce\Http\Requests\PersonaFormRequest;
use Ecommerce\User;
use DB;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        //si existe request
        if ($request) {
            $query= trim($request->get('searchText'));
            $splitName = explode(' ', $query, 2); 

            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : '';
            // '%' comodin en la busqueda
            $personas= DB::table('personas')
            ->where('nombre','like','%'.$query.'%')
            ->where('apellido','LIKE','%'.$last_name.'%')
            ->where('tipo_persona','=','Proveedor')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view('compras.proveedores.index',["personas"=>$personas,"searchText"=>$query]);
        }        
    }   
    
    public function create(){
        $users= User::all();
        return view("compras.proveedores.create",['users'=>$users]);
    }

    public function store(PersonaFormRequest $request){
        $persona= new Persona;
        $persona->idusuario=$request->get('idusuario');
        $persona->tipo_persona = 'Proveedor';
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        if ($request->exists('telefono')) {
            $persona->telefono=$request->get('telefono');
        }
        $persona->cod_postal=$request->get('cod_postal');
        $persona->calle=$request->get('calle');
        $persona->numero=$request->get('numero');
        if ($request->exists('piso')) {
            $persona->piso=$request->get('piso');
        }
        $persona->localidad=$request->get('localidad');
        $persona->partido=$request->get('partido');
        
        $persona->save();
        return Redirect::to('compras/proveedores');
    }

    public function show($id){
        return view ("compras.proveedores.show",["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id){
        return view ("compras.proveedores.edit",["persona"=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request, $id)
    {
        $persona = Persona :: findOrFail($id);
        $persona->idusuario=$request->get('idusuario');
        $persona->tipo_persona = 'Proveedor';
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        if ($request->exists('telefono')) {
            $persona->telefono=$request->get('telefono');
        }
        $persona->cod_postal=$request->get('cod_postal');
        $persona->calle=$request->get('calle');
        $persona->numero=$request->get('numero');
        if ($request->exists('piso')) {
            $persona->piso=$request->get('piso');
        }
        $persona->localidad=$request->get('localidad');
        $persona->partido=$request->get('partido');
        $persona->update();
        return Redirect('compras/proveedores');
    }
    public function destroy($id){
        $persona = Persona :: findOrFail($id);
        $persona->tipo_persona='inactivo';
        $persona->update();
        return Redirect::to('compras/proveedores');
    }
}
