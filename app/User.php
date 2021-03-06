<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'surname', 'email', 'avatar', 'password', 'state', 'role', 'notification'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*Relacion de uno a muchos*/
/*    public function subdelegaciones() {
        return $this->hasMany('App\SubDelegacion');
    }*/


    /*Relacion de muchos a uno*/
/*    public function subdelegacion() {

        return $this->belongsTo('App\SubDelegacion', 'fk_sub_id');
    }*/
}
