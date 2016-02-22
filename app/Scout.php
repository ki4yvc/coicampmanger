<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scout extends Model
{
    //
    public function troop() {
      return $this->belongsTo('App\Troop','troop_id');
    }

    public function classes() {
      return $this->belongsToMany('App\Sclass', 'scout_sclass', 'scout_id', 'sclass_id');
    }

    /*public function scout_class() {
      $this->hasMany('App\Scout_Class');
    }*/
}
