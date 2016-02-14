<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Troop;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class TroopController extends Controller
{
    //
  public function __construct() {
     $this->middleware('auth');
  }
  /*
  * FUCK this method
  * Direcrly in the ass
  */
   public function index() {

    $troops = Troop::all();
     return view('troops.index')
          ->with('troops',$troops);

    }

    public function create() {

      return view('troops.create');

    }

    public function store() {
      $rules = array(
        'firstname'    =>   'required'
      );
      $validator = Validator::make(Request::all(), $rules);

      if($validator->fails()) {
        return Redirect::to('troops/create')
          ->withErrors($validator);
        } else {
          $troop = new Troop;
        }

    }
}
