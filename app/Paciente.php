<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /**
     * @var string
     */
    protected $table = 'pacientes';

    protected $primaryKey = 'pac_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'pac_nombre',
        'pac_apellidos',
        'pac_edad',
        'pac_sexo',
        'pac_fallecido',
        'hos_fk_id'
    ];
}
