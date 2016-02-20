<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scout_Class extends Model
{
    protected $table = 'scout_registrations';

    public function scout() {
      $this->belongsTo('App\Scout','scout_id');
    }
}