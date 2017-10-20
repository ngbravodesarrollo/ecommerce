<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Ecommerce\Metal;
use Ecommerce\Http\Requests\MetalFormRequest;

class MetalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
    	//si existe request
    	if ($request) {
    		$query= trim($request->get('searchText'));
    		// '%' comodin en la busqueda
    		$metales= DB::table('Metales')->where('nombre','like','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idmetal','desc')
    		->paginate(7);
    		return view('almacen.metales.index',["metales"=>$metales,"searchText"=>$query]);   
    	}        
    }
    
    public function create(){
    	return view("almacen.metales.create");
    }

    public function store(MetalFormRequest $request){
    	$metal= new Metal;
    	$metal->nombre=$request->get('nombre');
    	$metal->descripcion=$request->get('descripcion');
    	$metal->condicion= '1';
    	$metal->save();
    	return Redirect::to('almacen/metales');
    }

    public function show($id){
    	return view ("almacen.metales.show",["metal"=>Metal::findOrFail($id)]);
    }
    public function edit($id){
		return view ("almacen.metales.edit",["metal"=>Metal::findOrFail($id)]);
    }
    public function update(MetalFormRequest $request, $id)
    {
    	$metal = Metal:: findOrFail($id);
    	$metal->nombre= $request->get('nombre');
    	$metal->descripcion = $request -> get('descripcion');
    	$metal->update();
    	return Redirect('almacen/metales');
    }
    public function destroy($id){
    	$metal= Metal:: findOrFail($id);
    	$metal->condicion='0';
    	$metal->update();
    	return Redirect('almacen/metales');
    }    
}
