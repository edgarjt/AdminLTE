<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitacora';

    /**
     * @var string[]
     */
    protected $fillable = [
        'hora_llamada',
        'hora_salida',
        'hora_llegada',
        'num_ambulancia',
        'tip_servicio',
        'fallecido',
        'nombre_paciente',
        'apellidos_paciente',
        'edad_paciente',
        'sexo_paciente',
        'hora_traslado',
        'hospital_traslado',
        'llegada_hospital',
        'llegada_base',
        'nombre_operador',
        'nombre_paramedico',
        'dir_servicio',
        'km_salida_base',
        'km_llegada_base',
        'folio_frap',
        'folio_c4',
        'tel_reporte',
        'situacion_traslado',
        'veces_atendido'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio() {
        return $this->belongsTo(ClaveServicio::class, 'tip_servicio', 'id');
    }
}
