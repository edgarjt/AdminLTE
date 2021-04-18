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
     * @var string[]
     */
    protected $fillable = ['code', 'emergencia'];
}
