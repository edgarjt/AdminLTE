<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'pac_id';
    protected $fillable = ['pac_nombre', 'pac_apellidos', 'pac_nacimiento', 'fk_sub_id', 'fk_enf_id', 'fk_eme_id', 'fk_use_id'];

    public function subdelegacion() {
        return $this->belongsTo('App\SubDelegacion', 'fk_sub_id');
    }

    public function enfermedad() {
        return $this->belongsTo('App\Enfermedad', 'fk_enf_id');
    }

    public function emergencia() {
        return $this->belongsTo('App\Emergencia', 'fk_eme_id');
    }
}
