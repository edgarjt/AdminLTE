<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDelegacion extends Model
{
    protected $table = 'subdelegaciones';
    protected $primaryKey = 'sub_id';
    protected $fillable = ['sub_nombre', 'sub_descripcion', 'sub_calle', 'fk_mun_id'];

    public function municipio() {
        return $this->belongsTo('App\Municipio', 'fk_mun_id');
    }
}
