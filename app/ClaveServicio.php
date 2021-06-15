<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaveServicio extends Model
{
    /**
     * @var string
     */
    protected $table = 'clave_servicio';

    /**
     * @var string
     */
    protected $primaryKey = 'cla_id';

    /**
     * @var string[]
     */
    protected $fillable = ['cla_code', 'cla_emergencia'];
}
