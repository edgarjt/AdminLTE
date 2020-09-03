<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fallecido extends Model
{
    protected $table = 'fallecidos';
    protected $primaryKey = 'fal_id';
    protected $fillable = ['fk_pac_id'];
}
