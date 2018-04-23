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
class AssignrmController extends Controller
{
	public function loadrm()
	{
		 $state = DB::select("call usp_load_states()");
		 $rmlist = DB::select("call usp_load_rm_list()");
		return view('dashboard.Assignrm',['state'=>$state,'rmlist'=>$rmlist]); //,['state'=>$state,'manager'=>$manager]
	}

	public function loadfba($flag,$value)
	{
		 $pincode = DB::select("call usp_load_fba_assign($flag,$value)");
  		 return json_encode($pincode);
	}

	public function updatefba(Request $req)
	{
		foreach ($req->ddlfba as $key => $value) {			
		$query=DB::table('FBAMast')
            ->where('FBAID','=',$value)
            ->update(['rm_id' =>$req->ddlrmlist]);        
		}
        return response()->json(array('status' =>0,'message'=>"success"));            
	}
}

