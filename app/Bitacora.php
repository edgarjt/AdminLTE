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
     * @var string
     */
    protected $primaryKey = 'bit_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'bit_hora_llamada',
        'bit_hora_salida',
        'bit_hora_llegada',
        'bit_num_ambulancia',
        'bit_hora_traslado',
        'bit_llegada_hospital',
        'bit_llegada_base',
        'bit_nombre_operador',
        'bit_nombre_paramedico',
        'bit_dir_servicio',
        'bit_km_salida_base',
        'bit_km_llegada_base',
        'bit_folio_frap',
        'bit_folio_c4',
        'bit_tel_reporte',
        'bit_situacion_traslado',
        'bit_veces_atendido',
        'tip_servicio_fk_id',
        'delegacion_fk_id',
        'pac_fk_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subdelegacion() {
        return $this->belongsTo(Delegacion::class, 'delegacion_fk_id', 'del_id');
    }

    public function servicio() {
        return $this->belongsTo(ClaveServicio::class, 'tip_servicio_fk_id', 'cla_id');
    }

    public function paciente() {
        return $this->belongsTo(ClaveServicio::class, 'pac_fk_id', 'cla_id');
    }
}
