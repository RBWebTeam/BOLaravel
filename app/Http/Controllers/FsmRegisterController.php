<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
class FsmRegisterController extends Controller
{
	/*public function getFSM(){
       return view('dashboard.FSMregister');
   }*/

public function bindsate()
{
   $query = DB::select("call usp_load_state_list()");
			/*	print_r($query);
	        exit();*/
        return view('dashboard.FSMregister')->with('query',$query);
}

}

