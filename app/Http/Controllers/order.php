<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function ord_dish() {
        return $this->hasMany('App\ord_dish');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }
}
