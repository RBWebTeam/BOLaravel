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
class QuickLeadController extends Controller
{
	public function quicklead()
	{
	 $id=Session::get('fbauserid');
     $query = DB::select("call Usp_get_quicklead($id)");    
  	 return view('QuickLead',['query'=>$query]);	
	}
	
}