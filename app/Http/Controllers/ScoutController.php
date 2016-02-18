<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scout;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class ScoutController extends Controller
{
  public function __construct() {
     $this->middleware('auth');
  }

  
}
