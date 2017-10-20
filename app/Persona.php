<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table= 'personas';

    protected $primaryKey= 'idpersona';

    public $timestamps= false;
    // capos que si queremos que se vean
    protected $filelable= [
        'idusuario',
    	'tipo_persona',
    	'nombre',
        'apellido',
    	'telefono',
    	'cod_postal',
    	'calle',
    	'numero',
    	'piso',
        'partido',
        'localidad'
    ];
    // campos que no queremos que se vean
    protected $guarded=[
    ];

}
