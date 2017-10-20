<?php 

namespace Ecommerce;


use Illuminate\Database\Eloquent\Model;

class Detalleingreso extends Model
{
    protected $table= 'detalles_ingresos';

    protected $primaryKey= 'iddetalle_ingreso';

    public $timestamps= false;
    // capos que si queremos que se vean
    protected $filelable= [
    	'idingreso',
        'idarticulo',
    	'cantidad',
    	'precio_compra',
    	'precio_venta'
    	
    ];
    // campos que no queremos que se vean
    protected $guarded=[
    ];
}
