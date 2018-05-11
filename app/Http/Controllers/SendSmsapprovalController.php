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
class SendSmsapprovalController extends Controller
{
	public function sendsmsview()
	{
		 $query = DB::select("call Usp_get_unsendedsms()");
         return view('SendSmsApproval',['query'=>$query]);
	}

}