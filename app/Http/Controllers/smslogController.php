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
class smslogController extends Controller
{

	public function getsmslog(){

		$query=DB::select("call Usp_getsmslog()");
		
 return view('dashboard.sms_log',['query'=>$query]);

	 }
  


  // SMS TEMPLATE CONTROLLE
  public function smstemplate(){
  return view('dashboard.sms_template');

	 }
	  public function smstemplateinsert (Request $req){
              
       DB::statement('call Usp_insertsmstaplate(?,?)',array( $req->hname,$req->txtmesg ));
        return Redirect('sms_template');
            }
 }