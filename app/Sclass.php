<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    protected $table = 'sclasses';

    public function scouts() {
      $this->belongsToMany('App\Scout');
    }
}
