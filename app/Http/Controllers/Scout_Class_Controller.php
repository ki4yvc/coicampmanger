<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scout_Class;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class Scout_Class_Controller extends Controller
{
  public function __construct() {
     $this->middleware('auth');
  }

  public function index() {
    if(Auth::user()->type == 'admin')
      $scout = Scout_Class::all();
    else
      $scout = Scout_Class::where('scout_id', Auth::user()->troop->id)
                        ->get();

    return view('scout_classes.index')
          ->with('scout',$scout);
  }

  public function create() {
    return view('scout_classes.create');
  }
}
