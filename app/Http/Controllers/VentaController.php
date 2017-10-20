<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Ecommerce\Http\Requests;
use Ecommerce\Http\Requests\VentaFormRequest;
use Ecommerce\Venta;
use Ecommerce\DetalleVenta;
Use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class VentaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
    	//si existe request
    	if ($request) {
    	$query=trim($request->get('searchText'));
    	$ventas=DB::table('ventas as v')
    	->join('personas as p','v.idcliente','=','p.idpersona')
    	->join('detalles_ventas as dv','v.idventa','=','dv.idventa')
    	->select('v.idventa','v.fecha_hora', 'p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta')
    	->where('v.num_comprobante','LIKE','%'.$query.'%')
    	->orderBy ('v.idventa', 'desc')
    	->groupBy('v.idventa','v.fecha_hora', 'p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante', 'v.impuesto', 'v.estado')
    	->paginate(7);
    	return view ('ventas.ventas.index',["ventas"=>$ventas,"searchText"=>$query]);  	
    	}      
    }

    public function create(){
    	$personas=DB::table('personas')->where('tipo_persona', '=', 'Cliente')-> get();
    	$articulos = DB::table('articulos as art')
    	->select(DB::raw('CONCAT(art.codigo, " ", art.nombre) AS articulo'), 'art.idarticulo','art.stock','di.precio_venta as precio_venta')
    	->join('detalles_ingresos as di','di.idarticulo','=','art.idarticulo')
    	->join('ingresos as ing','ing.idingreso','=','di.idingreso')
    	->whereRaw ('ing.fecha_hora = (
    SELECT MAX(ingresos.fecha_hora)
    FROM ingresos
    INNER JOIN detalles_ingresos ON ingresos.idingreso=detalles_ingresos.idingreso
    WHERE detalles_ingresos.idarticulo= art.idarticulo
)')
    	->orderBy('art.idarticulo')
        ->groupBy('ing.fecha_hora', 'art.idarticulo', 'art.nombre','art.codigo', 'di.precio_venta', 'di.precio_compra')->get();

    	//probar o crear una visa
    	return view("ventas.ventas.create",["personas"=>$personas,"articulos" => $articulos]);
    }

    public function store(VentaFormRequest $request){
        try {
            DB::beginTransaction();
            $venta = new Venta;
            $venta->idcliente=$request->get('idcliente');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->serie_comprobante=$request->get('serie_comprobante');
            $venta->num_comprobante=$request->get('num_comprobante');
            $venta->total_venta=$request->get('total_venta');

            $mytime= Carbon::now('America/Argentina/Buenos_Aires');
            $venta->fecha_hora=$mytime->toDateTimeString();
            $venta->impuesto='21';
            $venta->estado='A';//a de activo
            $venta->save();
            //estos vienen del carrito
            //arrays 
            $idarticulo= $request->get('idarticulo');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
            $precio_venta=$request->get('precio_venta');

            $cont=0;

            while($cont <count($idarticulo)){
                $detalle= new DetalleVenta();
                $detalle->idventa=$venta->idventa;
                $detalle->idarticulo= $idarticulo[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->descuento=$descuento[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
                $detalle->save();
                $cont++;
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return Redirect::to('ventas/ventas');
    }

    public function show($id){
        $venta=DB::table('ventas as v')
        ->join('personas as p','v.idcliente','=','p.idpersona')
        ->join('detalles_ventas as dv','v.idventa','=','dv.idventa')
        ->select('v.idventa','v.fecha_hora', 'p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta')
        ->where('v.idventa','=',$id)
        ->first();
        $detalles= DB::table('detalles_ventas as dv')
        ->join('articulos as a','dv.idarticulo','=','a.idarticulo')
        ->select('a.nombre as articulo','dv.cantidad','dv.precio_venta','dv.descuento')
        ->where('dv.idventa','=',$id)
        ->get();
        return view("ventas.ventas.show",["venta"=>$venta,"detalles"=>$detalles]);
    }

    public function destroy($id){
        $venta= Venta::findOrFail($id);
        $venta->Estado='C';
        $venta->update();
        return Redirect::to('ventas/ventas');
    }
}
