<?php 

namespace Ecommerce;


use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table= 'ingresos';

    protected $primaryKey= 'idingreso';

    public $timestamps= false;
    // capos que si queremos que se vean
    protected $filelable= [
    	'idproveedor',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'estado'
    ];
    // campos que no queremos que se vean
    protected $guarded=[
    ];
}
