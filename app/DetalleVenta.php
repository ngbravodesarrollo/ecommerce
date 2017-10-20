<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
     protected $table= 'detalles_ventas';

    protected $primaryKey= 'iddetalle_venta';

    public $timestamps= false;
    // capos que si queremos que se vean
    protected $filelable= [
    	'idventa',
        'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'descuento'
    	
    ];
    // campos que no queremos que se vean
    protected $guarded=[
    ];
}
