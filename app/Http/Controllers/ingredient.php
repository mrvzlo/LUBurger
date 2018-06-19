<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    public function order() {
        return $this->hasMany('App\dish_ingr');
    }
}
