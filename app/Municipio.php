<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'mun_id';
    protected $fillable = ['mun_clave', 'mun_nombre', 'mun_siglas', 'fk_est_id'];

    public function estado() {
        return $this->belongsTo('App\Estado', 'fk_est_id');
    }
}
