<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scout;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class ScoutController extends Controller
{
  public function __construct() {
     $this->middleware('auth');
  }

	public function index() {

    if(Auth::user()->type == 'admin')
      $scout = Scout::all();
    else
      $scout = Scout::where('troop_id', Auth::user()->troop->id)
                        ->get();

    return view('scouts.index')
          ->with('scouts',$scout);

	}

	public function edit($id){

		$scout = Scout::find($id);

		if($scout) //if scout exists

		if($scout->troop_id == Auth::user()->troop->id || Auth::user()->type == 'admin' ) // if troop's user is me or im the admin

		  return view('scouts.edit')
		          ->with('id', $scout->id)
		          ->with('firstname', $scout->firstname)
		          ->with('lastname', $scout->lastname)
		          ->with('age', $scout->age)
		          ->with('troop_id', $scout->troop_id);

		return redirect()->to('scout');

	}

	public function update($id, Request $request)
    {
      $rules = array(
        'firstname'    =>   'required'
      );

      $scout = Scout::find($id);

      if( $scout ){
        if($scout->troop_id == Auth::user()->troop->id || Auth::user()->type == 'admin' ){ // if troop's user is me or im the admin

          $validator = Validator::make($request->all(), $rules);

          if($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          } else {
              $scout->firstname = $request->input('firstname');
              $scout->lastname = $request->input('lastname');
              $scout->age = $request->input('age');
              if(!empty($scout->troop_id)){
              	$scout->troop_id = $scout->troop_id;
              }else{
              	$scout->troop_id = $request->input('troop_id');
              }
              $scout->save();
              return redirect()->to('scout');
          }

        }
      }

    }




	public function create() {

      $current_user = Auth::user();

      //check if user is logged in
      if ( $current_user ){

        if ( $current_user->troop ){

          return view('scouts.create');

        }

      }

      return view('login');

    }

    public function store(Request $request) {
		$rules = array(
		'firstname'    =>   'required'
		);

		$current_user = Auth::user();

		//check if user is logged in


		$validator = Validator::make($request->all(), $rules);

		if($validator->fails()) {
		  return redirect()->back()->withErrors($validator->messages());
		} else {
		    $scout = new Scout;

		    $scout->firstname = $request->input('firstname');
		    $scout->lastname = $request->input('lastname');
		    $scout->age = $request->input('age');
		    $scout->troop_id = Auth::user()->troop->id;

		    $scout->save();
		    return redirect()->to('scout');
		}

    }


}
