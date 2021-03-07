<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table = 'enfermedades';
    protected $primaryKey = 'enf_id';
    protected $fillable = ['enf_nombre', 'created_at'];
}
