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
use Excel;
         class getcrmroleController extends CallApiController 
         {

         	public function crm_role(Request $req){
			//print_r($req->all());exit();
		 	 $data=DB::select('call get_crm_disposition_role(?,?)',array($req->id,$req->fba_id));	

		  	if (count($data)>0) {
		  	return $this->send_success_response('Successfully','Success',$data);
		  }else{
		  	return $this->send_failure_response('Data Not Found','Failure',[]);
		  }
		 //print_r($data);exit();
	}



			public function get_crm_disposition(Request $req){
			//print_r($req->all());exit();
		 	 //$data=DB::select("call get_crm_disposition($req->followup_internalteam)");	
		 	 $data=DB::select('call get_crm_disposition(?)',array($req->followup_internalteam));	

		  	if (!empty($data)) {
		  	return $this->send_success_response('Successfully','Success',$data);
		  }else{
		  	return $this->send_failure_response('Data Not Found','Failure',[]);
		  }
		 //print_r($data);exit();
	}

	



         }