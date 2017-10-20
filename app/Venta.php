<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table= 'ventas';

    protected $primaryKey= 'idventa';

    public $timestamps= false;
    // capos que si queremos que se vean
    protected $filelable= [
    	'idcliente',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_documento',
    	'fecha_hora',
    	'impuesto',
    	'total_venta',
    	'estado'
    ];
    // campos que no queremos que se vean
    protected $guarded=[
    ];
}
