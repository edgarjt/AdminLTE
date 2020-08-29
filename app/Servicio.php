<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'ser_id';
    protected $fillable = ['ser_total', 'fk_enf_id', 'fk_eme_id', 'fk_sub_id'];
}
