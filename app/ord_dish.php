<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ord_dish extends Model
{
    public function order() {
        return $this->belongsTo('App\order');
    }

    public function dish() {
        return $this->belongsTo('App\dish');
    }
}
