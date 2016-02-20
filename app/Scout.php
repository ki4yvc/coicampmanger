<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scout extends Model
{
    //
    public function troop() {
      $this->belongsTo('App\Troop','troop_id');
    }

    /*public function scout_class() {
      $this->hasMany('App\Scout_Class');
    }*/
}
