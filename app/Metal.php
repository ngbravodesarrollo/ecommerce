<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Metal extends Model
{
    protected $table= 'Metales';

    protected $primaryKey= 'idmetal';

    public $timestamps= false;
    // capos que si queremos que se vean
    protected $filelable= [
    	'nombre',
    	'description',
    	'condicion'
    ];
    // campos que no queremos que se vean
    protected $guarded=[
    ];

    public function scopeActives($query){
        return $query->where('condicion','=',1);
    }
}
