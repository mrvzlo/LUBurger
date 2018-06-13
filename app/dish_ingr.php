<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dish_ingr extends Model
{
    public function ingredient() {
        return $this->belongsTo('App\ingredient');
    }

    public function dish() {
        return $this->belongsTo('App\dish');
    }
}
