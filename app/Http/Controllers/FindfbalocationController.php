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
class FindfbalocationController extends Controller
{
	 public function getfbadata()	 
	 {
	 	$query=DB::select("call USP_get_location_fba()");
	 	return view ('dashboard.FindFbalocation',['query'=>$query]);
	 }

	

}