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
     $status=DB::select("call Usp_get_quick_lead_status()");
     return view('QuickLead',['query'=>$query,'status'=>$status]);	
	}
	
	public function insertquickleadstatus(Request $req)
	{
	$id=Session::get('fbauserid');
	DB::statement('call Usp_insert_update_quickleadstatus(?,?,?,?)',array(
		  $req->txtleadid,
          $req->ddlstatus,
          $req->txtremark,
          $id
         )
       );

	}

	public function gethistory($leadid)
	{  
		$history = DB::select("call Usp_get_quick_lead_history($leadid)");
		 return json_encode($history);
       
	}
}