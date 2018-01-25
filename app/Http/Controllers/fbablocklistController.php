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
class fbablocklistController extends Controller
{
	public function  fbablocklist(){

		$query=DB::select("call usp_load_fbalist_new(0)");
		// print_r($query); exit();

                // $query=array(1,2,3,4);
		return view ('dashboard.fbablocklist',['query'=>$query]);
	}
}