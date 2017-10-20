<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Ecommerce\Articulo;
use Ecommerce\Metal;
use Ecommerce\Coleccion;
use Ecommerce\Categoria;
use Ecommerce\Http\Requests\ArticuloFormRequest;
use DB;
use Validator;

class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
    	//si existe request
    	if ($request) {
    		$query= trim($request->get('searchText'));
    		// '%' comodin en la busqueda
    		$articulos= DB::table('articulos as a')
    		->leftJoin('categorias as ca','a.idcategoria','=','ca.idcategoria')
            ->leftJoin('colecciones as co','a.idcoleccion','=','co.idcoleccion')
            ->leftJoin('Metales as m','a.idmetal','=','m.idmetal')
    		->select('a.idarticulo','a.nombre','a.codigo','a.stock','ca.nombre as categoria','co.nombre as coleccion','m.nombre as metal' ,'a.descripcion','a.imagen','a.estado')
    		->where('a.nombre','like','%'.$query.'%')
    		->where('ca.condicion','=','1')
    		->orderBy('a.idarticulo','desc')
    		->paginate(7);
            //return $articulos->toArray();
    		return view('almacen.articulos.index',["articulos"=>$articulos,"searchText"=>$query]);   
    	}        
    }
    
    public function create(){
    	return view("almacen.articulos.create",[
            'metales' => Metal::Actives()->get(),
            'categorias'=> Categoria::Actives()->get(),
            'colecciones' => Coleccion::Actives()->get()]);
    }

    public function store(ArticuloFormRequest $request){
    	$articulo= new Articulo;
    	$articulo->codigo=$request->get('codigo');
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->stock=$request->get('stock');
    	$articulo->nombre=$request->get('nombre');
    	$articulo->descripcion=$request->get('descripcion');
    	$articulo->estado= 'Activo';
        if ($request->get('idmetal') >0) {
            $articulo->idmetal= $request->get('idmetal');
        }
        if ($request->get('idcoleccion') >0) {
            $articulo->idcoleccion= $request->get('idcoleccion');
        }
    	if(Input::hasfile('imagen')){
    		$file= Input::file('imagen');
    		$file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
    		$articulo->imagen=$file->getClientOriginalName();
    	}
    	$articulo->save();
    	return Redirect::to('almacen/articulos');
    }

    public function show($id){
    	return view ("almacen.articulos.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id){
		return view ("almacen.articulos.edit",["articulo"=>Articulo::findOrFail($id),
            'metales' => Metal::Actives()->get(),
            'categorias'=> Categoria::Actives()->get(),
            'colecciones' => Coleccion::Actives()->get()]);
    }
    public function update(ArticuloFormRequest $request, $id)
    {
    	$articulo = Articulo::findOrFail($id);
    	$articulo->codigo=$request->get('codigo');
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->stock=$request->get('stock');
    	$articulo->nombre=$request->get('nombre');
    	$articulo->descripcion=$request->get('descripcion');
    	$articulo->estado= 'Activo';
        if ($request->get('idmetal') >0) {
            $articulo->idmetal= $request->get('idmetal');
        }
        if ($request->get('idcoleccion') >0) {
            $articulo->idcoleccion= $request->get('idcoleccion');
        }
    	if(Input::hasfile('imagen')){
    		$file= Input::file('imagen');
    		$file->move(public_path().'imagenes/articulos/',$file->getClientOriginalName());
    		$articulo->imagen=$file->getClientOriginalName();
    	};
    	$articulo->update();
    	return Redirect('almacen/articulos');
    }
    public function destroy($id){
    	$articulo= Articulo:: findOrFail($id);
    	$articulo->estado='Inactivo';
    	$articulo->update();
    	return Redirect('almacen/articulos');
    }    
}
