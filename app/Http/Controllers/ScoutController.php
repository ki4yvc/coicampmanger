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
		else{
			if(Auth::user()->troop)
		  		$scout = Scout::where('troop_id', Auth::user()->troop->id)
		                    	->get();
		    else
		    	$scout = [];
		}

		return view('scouts.index')
		      ->with('scouts',$scout);

	}

	public function schedule($id){

		$scout = Scout::find($id);
		if($scout) //if scout exists

			$troop_id = NULL;
			if(Auth::user()->troop){
				$troop_id = Auth::user()->troop->id;
			}

		if($scout->troop_id == $troop_id || Auth::user()->type == 'admin' ) // if troop's user is me or im the admin

			$mo912 = NULL;
			$sclasses = $scout->classes();
			// return $sclasses;

			if(count($sclasses) > 0)

			foreach($sclasses as $sclass) {
				if($sclass->day == 'Monday' && $sclass->duration == 'AM Only'){
					$mo912 = $sclass->name;
				}
			}

			$context = array(
				'mo912' => $mo912
			);


		  	return view('scouts.schedule', $context)
		          ->with('id', $scout->id)
		          ->with('scout', $scout);

		return redirect()->to('scout');

	}

	public function update_schedule($id, Request $request){



		return 'success';

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
      return redirect()->to('login');
      // return view('login');

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
