<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial';
    protected $primaryKey = 'his_id';
    protected $fillable = ['fk_pac_clave', 'fk_sub_id', 'fk_enf_id', 'fk_eme_id', 'fk_use_id'];

    public function subdelegacion() {
        return $this->belongsTo('App\SubDelegacion', 'fk_sub_id');
    }

    public function enfermedad() {
        return $this->belongsTo('App\Enfermedad', 'fk_enf_id');
    }

    public function emergencia() {
        return $this->belongsTo('App\Emergencia', 'fk_eme_id');
    }

    public function paramedico() {
        return $this->belongsTo('App\User', 'fk_use_id');
    }
}
