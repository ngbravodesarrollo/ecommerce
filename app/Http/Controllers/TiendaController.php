<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Categoria;
use Ecommerce\Metal;
use Ecommerce\Coleccion;
use DB;

class TiendaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    function articulos(Request $request){
        if ($request) {
            //where
            //query para obtener el precio actual
            $query="ing.fecha_hora = (
            SELECT MAX(ingresos.fecha_hora)
            FROM ingresos
            INNER JOIN detalles_ingresos ON ingresos.idingreso=detalles_ingresos.idingreso
            WHERE detalles_ingresos.idarticulo= a.idarticulo)";
            $query.=" AND a.estado = 'Activo'";
            if ($request->has('nombre')) {
                $nombre= trim($request->get('nombre'));
                $query.=' AND a.nombre LIKE "%'.$nombre.'%"';
            }
            if($request->has('categoria')){
                $categoria= trim($request->get('categoria'));
                $query.=" AND a.idcategoria = ".$categoria;
            }
            if($request->has('metal')){
                $metal= trim($request->get('metal'));
                $query.=" AND a.idmetal = ".$metal;
            }
            if($request->has('coleccion')){
                $coleccion= trim($request->get('coleccion'));
                $query.=" AND a.idcoleccion = ".$coleccion;
            }
            //orderBy
            if ($request->has('orderby')) {
                $orderBy= trim($request->get('orderby'));
                if ($request->has('desc')) {
                    $orderBy.=" DESC";
                }
                $orderBy.=",";
            }

            $orderBy="a.idarticulo DESC";
            $articulos= DB::table('articulos as a')
            ->join('detalles_ingresos as di','di.idarticulo','=','a.idarticulo')
            ->join('ingresos as ing','ing.idingreso','=','di.idingreso')
            ->join('categorias as c','a.idcategoria','=','c.idcategoria')
            ->join('metales as met','a.idmetal','=','met.idmetal')
            ->join('colecciones as col','a.idcoleccion','=','col.idcoleccion')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','di.precio_venta','c.nombre as categoria','met.nombre as metal','col.nombre as coleccion','a.descripcion','a.imagen','a.estado')
            ->whereRaw($query)
            ->orderByRaw($orderBy);
            return $articulos->toArray();
        }        
    }

    function loMasVendido(Request $request){
        if ($request) {
            //where
            //query para obtener el precio actual
            $query="ing.fecha_hora = (
            SELECT MAX(ingresos.fecha_hora)
            FROM ingresos
            INNER JOIN detalles_ingresos ON ingresos.idingreso=detalles_ingresos.idingreso
            WHERE detalles_ingresos.idarticulo= a.idarticulo)";
            $query.=" AND a.estado = 'Activo'";
            if ($request->has('nombre')) {
                $nombre= trim($request->get('nombre'));
                $query.=' AND a.nombre LIKE "%'.$nombre.'%"';
            }
            if($request->has('categoria')){
                $categoria= trim($request->get('categoria'));
                $query.=" AND a.idcategoria = ".$categoria;
            }
            if($request->has('metal')){
                $metal= trim($request->get('metal'));
                $query.=" AND a.idmetal = ".$metal;
            }
            if($request->has('coleccion')){
                $coleccion= trim($request->get('coleccion'));
                $query.=" AND a.idcoleccion = ".$coleccion;
            }
            //where productos mas vendidos
            //$query.="a.idarticulo in (SElECT ";
            //orderBy
            if ($request->has('orderby')) {
                $orderBy= trim($request->get('orderby'));
                if ($request->has('desc')) {
                    $orderBy.=" DESC";
                }
                $orderBy.=",";
            }
            $orderBy="a.idarticulo DESC";
            $articulos= DB::table('articulos as a')
            ->join('detalles_ingresos as di','di.idarticulo','=','a.idarticulo')
            ->join('ingresos as ing','ing.idingreso','=','di.idingreso')
            ->join('categorias as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','di.precio_venta','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->whereRaw($query)
            ->orderByRaw($orderBy);
            return $articulos->toArray();
        }        
    }
    
    function categorias(Request $request){
        return Categoria::actives()->get();
    }

    function metales(Request $request){
        return Metal::actives()->get();
    }
    function colecciones(Request $request){
        return Coleccion::actives()->get();
    }
}
