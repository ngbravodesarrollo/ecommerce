<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use MP;
use Ecommerce\Http\Requests;
use Ecommerce\Http\Controllers\Controller;
use Ecommerce\Articulo;
use DB;

class CarritoController  extends Controller
{ 
  private function getProductos($id){
    $articulos = DB::table('articulos as art')
      ->select('art.codigo','art.nombre','art.imagen','cat.nombre as categoria','art.descripcion','art.idarticulo','art.stock','di.precio_venta as precio_venta')
      ->join('categorias as cat','art.idcategoria','=','cat.idcategoria')
      ->join('detalles_ingresos as di','di.idarticulo','=','art.idarticulo')
      ->join('ingresos as ing','ing.idingreso','=','di.idingreso')
      ->whereRaw ('ing.fecha_hora = (
        SELECT MAX(ingresos.fecha_hora)
        FROM ingresos
        INNER JOIN detalles_ingresos ON ingresos.idingreso=detalles_ingresos.idingreso
        WHERE detalles_ingresos.idarticulo= art.idarticulo
    )')
    ->whereIn('art.idarticulo',$id)
      ->orderBy('art.idarticulo')
        ->groupBy('ing.fecha_hora', 'art.idarticulo', 'art.nombre','art.codigo', 'di.precio_venta', 'di.precio_compra')->get();
    return $articulos;
  }

  public function getToken(){

    $preference = MP::get_access_token();
    return $preference;
  }

  public function createPreference(Request $request){
    if (session()->has('carrito')){
      $carrito = session('carrito');
      //reviso que no este vacia la variable session
      if (count($carrito)>0){
        $carrito= $carrito[0];
        $valid=true;
        //obtengo los id del carrito
        $ids=$carrito->pluck('idproducto');
        $firstTitle="";
        //$carrito->each(function($item,$key) use ($firstTitle){
        //  // array_push($ids,$car->id);
        //  $firstTitle.= substr($item['nombre'], 3) ."x".$item['stock'];
        //});
        //Busco los productos
        $productos = $this->getProductos($ids);
        foreach($productos as $key=> $val) {
          $index= $carrito->search('idproducto',$val->idarticulo);
          $aux= $carrito[$index];
          //valido stock
          if ($aux['cant'] < $val->stock) {
            $firstTitle.= substr($val->nombre,0, 3) .'x'.$aux['cant'];
          }
          else{
            $valid=false;
            break;
          }
        }
        //si el stock es valido
        if(!$valid){
          //devuelvo error y $index
        }
        //creo preferencias
        $i=0;
        $items=[];
        if (count($productos)==1) {          
          $firstTitle= $productos[0]->nombre;
        }
        foreach ($productos as $prod){ 
          $index= $carrito->search('idproducto',$prod->idarticulo);
          $aux= $carrito[$index];
          if ($i==0) {          
            array_push($items, ['id' => $prod->idarticulo,
            'category_id' => $prod->categoria,
            'title' => $firstTitle,
            'description' => $prod->descripcion,
            'quantity' => $aux['cant'],
            'currency_id' => 'ARS',
            'unit_price' => (float)$prod->precio_venta]);
          }
          else{
            array_push($items, ['id' => $prod->idarticulo,
            'category_id' => $prod->categoria,
            'title' => $prod->nombre,
            'description' => $prod->descripcion,
            'quantity' => $aux['cant'],
            'currency_id' => 'ARS',
            'unit_price' => (float)$prod->precio_venta]);
          }
        }
        //generar url segun el estado de la compra
        $preferenceData = [
          'items' => $items,
          'back_urls' => [
            'success' => 'carrito/action/susecces',
            'pending' => 'carrito/action/pending',
            'failure' => 'carrito/action/failure'
          ],
        ];
        
        $preference = MP::create_preference($preferenceData);
        //return $preference['response']['init_point'];
        return $preference['response']['sandbox_init_point'];

        return response($preference,200)
              ->header('Content-Type','application/json');
      }
    }
    return response("No hay elementos cargados en el carrito",500)
          ->header("Content-Type","text/plain");
  }

	public function index(){
		$response="No hay productos seleccionados";
    //reviso que este cargada la session
    if (session()->has('carrito')){
      $carrito = session('carrito');
      //reviso que no este vacia la variable session
      if (count($carrito)>0){		
        $carrito= $carrito[0];        
        $ids=$carrito->pluck('idproducto');

        $productos=collect([]);
        //dd($carrito);
        //dd($ids);
				$articulos = $this->getProductos($ids);
				foreach ($articulos as $art) {
					//traigo el item segun el id del articulo
          $idarticulo= $art->idarticulo;
          $aux= $carrito->search(function($item,$key) use ($idarticulo){
            return $item['idproducto'] == $idarticulo;
          });
          $aux= $carrito[$aux];
          $item=['codigo'=>$art->codigo,
                 'idarticulo'=>$art->idarticulo,
                 'nombre'=>$art->nombre,
                 'stock'=>$art->stock,
                 'cant'=>$aux['cant'],
                 'imagen'=>$art->imagen,
                 'precio_venta'=>$art->precio_venta];
					$productos->push($item);
				}
				return $productos->toJson();   
			}
		}
		return response()->json([
      'error'=>'No items cargados en el carrito'
    ]);
	}

  public function addCarrito(Request $request){
    
    if ($request){
      //Traigo las variables post
      $idproducto=$request->get('idproducto');
      $nombre=$request->get('nombre');
      //si no hay cantidad
      if ($request->has('cant')){
        $cant= $request->get('cant');
      }
      else{
        $cant=1;
      }
      //reviso que este cargada la session
      if (session()->has('carrito')){
        $carrito = session('carrito');
        //reviso que no este vacia la variable session
        if (count($carrito)>0){
          //extraigo la coleccion de datos del array de la session
          $carrito=$carrito[0];
          //si no se encuentra el producto cargado
          if(!$carrito->contains('idproducto',$idproducto)){
            //agrego el producto a la variable session
            $carrito=$carrito->push(['idproducto'=>$idproducto , 'nombre'=>$nombre , 'cant' => $cant]);
          }
          else{
            // futuro cambio
            // //actualizo la cantidad pedida del producto
            // $carrito=$carrito->map(function($item,$key)use ($idproducto,$cant){
            //   $aux= array_get($item,'idproducto');
            //   if($aux == $idproducto){
            //     array_set($item,'cant',array_get($item,'cant') + $cant);
            //   }
            //   return $item;
            // });
          }
        }
        else{
          //inicio la coleccion
          $carrito= collect([0=>['idproducto'=>$idproducto , 'nombre'=>$nombre , 'cant' => $cant]]);
        }
      }
      else{
        //inicio la coleccion
        $carrito= collect([0=>['idproducto'=>$idproducto , 'nombre'=>$nombre , 'cant' => $cant]]);
      }
      //agrego/actualizo la variable session
      $request->session()->put(['carrito' => [$carrito]]);
      return response('true',200)
              ->header('Content-Type','application/json');
    }
    return response('No existe response',500)
              ->header('Content-Type','application/json');
  }

  public function removeCarrito($id){

      $idproducto=$id;

      if (session()->has('carrito')){
        $carrito = session('carrito');
        //reviso que no este vacia la variable session
        if (count($carrito)>0){
          $carrito=$carrito[0];
          $carrito=$carrito->reject(function($value,$key) use($id){
              return $value->idproducto == $id;
          });
          session(['carrito' => $carrito]);
          return true;     
        }
      }
  }

  public function flushCarrito(Request $request){
    $request->session()->forget('carrito');
    return response("true",200)
              ->header('Content-Type','application/json');
  }

  public function updateCant(Request $request, $id){
    if ($request) {
      //obetengo los post
      //$idproducto=$request->get('idproducto');
      $idproducto= $id;
      $cant=$request->get('cant');
      //traigo producto a validad

      $producto = $this->getProductos($idproducto);
      if ($cant > $productos->cant) {
         //return error
      }
      if (session()->has('carrito')){
        $validStock=true;
        $carrito = session('carrito');
        //reviso que no este vacia la variable session
        if (count($carrito)>0){
          $carrito=$carrito->map(function($item,$key)use ($producto,$cant,$validStock){
            $aux= $item['idproducto'];
            if($aux == $producto->idproducto){
              if ($item['cant']>$producto->stock) {
                $validStock=false;
              }
              else{
                array_set($item,'cant',$item['cant'] + $cant);
              }
            }
            return $item;
          });
          if ($validStock) {
            session(['carrito' => $carrito]);
            //return OK
          }
          else{
            //return no stock
          }

          //return OK
        }
      }
    }
  }

  public function successPreferences(Request $request){
    return view('tienda.resultado',['message'=>'Exitoso']);
  }

  public function pendingPreferences(Request $request){
    return view('tienda.resultado',['message'=>'Pendiente']);
  }

  public function failurePreferences(Request $request){
    return view('tienda.resultado',['message'=>'Fallo']);
  }
}
