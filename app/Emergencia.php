<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
    protected $table = 'emergencias';

    protected $primaryKey = 'eme_id';

    protected $fillable = ['eme_tipo', 'created_at'];
}
