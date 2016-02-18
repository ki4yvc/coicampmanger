<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scout_Class;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Scout_Class_Controller extends Controller
{
  public function __construct() {
     $this->middleware('auth');
  }

  public function index() {
    return view('scout_classes.index');
  }

  public function create() {
    return view('scout_classes.create');
  }
}
