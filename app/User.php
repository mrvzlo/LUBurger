<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function order() {
        return $this->hasMany('App\order');
    }

    public function rate() {
        return $this->hasMany('App\rate');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin() {
        return ($this->role == 2);
    } 
    public function isChef() {
        return ($this->role == 3);
    } 
}
