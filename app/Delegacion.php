<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegacion extends Model
{
    /**
     * @var string
     */
    protected $table = 'delegaciones';

    /**
     * @var string[]
     */
    protected $fillable = ['nombre', 'descripcion', 'calle'];
}
