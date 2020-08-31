<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'ser_id';
    protected $fillable = ['ser_total', 'fk_enf_id', 'fk_eme_id', 'fk_sub_id'];

    public function emergencia() {
        return $this->belongsTo('App\Emergencia', 'fk_eme_id');
    }

    public function enfermedad() {
        return $this->belongsTo('App\Enfermedad', 'fk_enf_id');
    }

    public function subDelegacion() {
        return $this->belongsTo('App\SubDelegacion', 'fk_sub_id');
    }
}
