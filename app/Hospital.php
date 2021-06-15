<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /**
     * @var string
     */
    protected $table = 'hospitales';

    protected $primaryKey = 'hos_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'hos_nombre',
        'hos_clave',
        'hos_localidad',
        'hos_descripcion',
        'hos_direccion',
        'hos_telefono',
        'hos_horario'
    ];
}
