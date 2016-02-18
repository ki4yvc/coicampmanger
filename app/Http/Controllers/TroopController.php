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

  public function index() {

    $troops = Troop::all();
    return view('troops.index')
          ->with('troops',$troops);

  }


    public function edit($id){

      $troop = Troop::find($id);

      return view('troops.edit')
              ->with('id', $troop->id)
              ->with('firstname', $troop->scout_master_first_name)
              ->with('lastname', $troop->scout_master_last_name)
              ->with('phone', $troop->scout_master_phone)
              ->with('email', $troop->scout_master_email)
              ->with('troopnumber', $troop->troop)
              ->with('council', $troop->council)
              ->with('week', $troop->week_attending_camp);

    }

    public function update($id, Request $request)
    {
      $rules = array(
        'firstname'    =>   'required'
      );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()) {
        return redirect()->back()->withErrors($validator->messages());
      } else {
          $troop = Troop::find($id);
          $troop->troop = $request->input('troopnumber');
          $troop->scout_master_first_name = $request->input('firstname');
          $troop->scout_master_last_name = $request->input('lastname');
          $troop->scout_master_phone = $request->input('phone');
          $troop->scout_master_email = $request->input('email');
          $troop->week_attending_camp = $request->input('week');
          $troop->council = $request->input('council');

          $troop->save();
          return redirect()->to('troop');
      }

    }

    public function create() {

      $current_user = Auth::user();

      //check if user is logged in
      if ( $current_user ){

        if ( $current_user->troop ){

          $troop_id = $current_user->troop->id;

          return redirect('troop/');

        }else{

          return view('troops.create');

        }


      }

      return view('login');


    }

    public function store(Request $request) {
      $rules = array(
        'firstname'    =>   'required'
      );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()) {
        return redirect()->back()->withErrors($validator->messages());
      } else {
          $troop = new Troop;


          $troop->troop = $request->input('troopnumber');
          $troop->scout_master_first_name = $request->input('firstname');
          $troop->scout_master_last_name = $request->input('lastname');
          $troop->scout_master_phone = $request->input('phone');
          $troop->scout_master_email = $request->input('email');
          $troop->week_attending_camp = $request->input('week');
          $troop->council = $request->input('council');
          $troop->user_id = Auth::user()->id;

          $troop->save();
          return redirect()->to('troop');
      }

    }
}
