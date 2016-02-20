<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sclass;
use App\Scout;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class SclassController extends Controller
{
  public function __construct() {
     $this->middleware('auth');
  }

	public function index() {

    if(Auth::user()->type == 'admin'){

      $sclass = Sclass::all();

      return view('sclass.index')
          ->with('sclass',$sclass);
    }else{
      return redirect()->to('login');
    }

	}

	public function edit($id){
      return $id;
	}

	public function update($id, Request $request){

    return redirect()->to('sclass');

  }




	public function create() {

      $current_user = Auth::user();

      //check if user is logged in
      if ( $current_user ){

        if ( $current_user->type == 'admin' ){

          return view('sclass.create');

        }

      }

      return view('login');

    }

    public function store(Request $request) {
  		$rules = array(
  		'name'    =>   'required'
  		);

  		$current_user = Auth::user();

  		//check if user is logged in
      if($current_user){
    		$validator = Validator::make($request->all(), $rules);

    		if($validator->fails()) {
    		  return redirect()->back()->withErrors($validator->messages());
    		} else {
    		    $sclass = new Sclass;

    		    $sclass->name = $request->input('name');
    		    $sclass->description = $request->input('description');
    		    $sclass->age = $request->input('age');

    		    $sclass->save();
    		    return redirect()->to('sclass');
    		}

    }

    }


}
