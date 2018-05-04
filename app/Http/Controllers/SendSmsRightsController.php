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
class SendSmsRightsController extends Controller
{
	public function sendsmsview()
	{
		$query = DB::select("call Usp_get_sendsmsusers()");
		return view('SendSmsRights',['query'=>$query]);
	}
	public function isdirectsend($userid)
	{
		DB::select("call Usp_set_isdirectsend($userid)");
		return "123";
	}

	public function isneedapproval($userid)
	{ 
		DB::select("call Usp_set_needapproval($userid)");
	
		return "123";
	}
}