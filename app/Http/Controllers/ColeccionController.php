<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Ecommerce\Coleccion;
use Ecommerce\Http\Requests\ColeccionFormRequest;

class ColeccionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
    	//si existe request
    	if ($request) {
    		$query= trim($request->get('searchText'));
    		// '%' comodin en la busqueda
    		$colecciones= DB::table('colecciones')->where('nombre','like','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idcoleccion','desc')
    		->paginate(7);
    		return view('almacen.colecciones.index',["colecciones"=>$colecciones,"searchText"=>$query]);   
    	}        
    }
    
    public function create(){
    	return view("almacen.colecciones.create");
    }

    public function store(ColeccionFormRequest $request){
    	$coleccion= new Coleccion;
    	$coleccion->nombre=$request->get('nombre');
    	$coleccion->descripcion=$request->get('descripcion');
    	$coleccion->condicion= '1';
    	$coleccion->save();
    	return Redirect::to('almacen/colecciones');
    }

    public function show($id){
    	return view ("almacen.colecciones.show",["coleccion"=>Coleccion::findOrFail($id)]);
    }
    public function edit($id){
		return view ("almacen.colecciones.edit",["coleccion"=>Coleccion::findOrFail($id)]);
    }
    public function update(ColeccionFormRequest $request, $id)
    {
    	$coleccion = Coleccion:: findOrFail($id);
    	$coleccion->nombre= $request->get('nombre');
    	$coleccion->descripcion = $request -> get('descripcion');
    	$coleccion->update();
    	return Redirect('almacen/colecciones');
    }
    public function destroy($id){
    	$coleccion= Coleccion:: findOrFail($id);
    	$coleccion->condicion='0';
    	$coleccion->update();
    	return Redirect('almacen/colecciones');
    }    
}
