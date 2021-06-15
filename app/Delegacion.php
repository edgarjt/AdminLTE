<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegacion extends Model
{
    /**
     * @var string
     */
    protected $table = 'delegaciones';

    protected $primaryKey = 'del_id';

    /**
     * @var string[]
     */
    protected $fillable = ['del_nombre', 'del_descripcion', 'del_calle'];
}
