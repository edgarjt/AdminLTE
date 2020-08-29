<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'est_id';
    protected $fillable = ['est_clave', 'est_name', 'est_siglas'];
}
