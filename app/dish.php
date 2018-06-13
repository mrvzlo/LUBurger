<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dish extends Model
{
    public function rate() {
        return $this->hasMany('App\rate');
    }
    public function dish_ingr() {
        return $this->hasMany('App\dish_ingr');
    }
    public function ord_dish() {
        return $this->hasMany('App\ord_dish');
    }
}
