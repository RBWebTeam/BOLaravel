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
class FsmDetailsController extends Controller
{
	public function FsmDetails(){

		$query = DB::select("call usp_LeadersDetail(49,null,null,null,null,null,null)");
			/*	print_r($query);
	        exit();*/
        return view('dashboard.Fsm_Details')->with('query',$query);

		/*return view('dashboard.Fsm_Details');*/
	

        }

        
}