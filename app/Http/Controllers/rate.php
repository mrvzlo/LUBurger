<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    public $table = "rating";
    public function dish() {
        return $this->belongsTo('App\dish');
    }

    public function rate() {
        return $this->belongsTo('App\rate');
    }
}
