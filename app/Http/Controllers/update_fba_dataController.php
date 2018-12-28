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
         class update_fba_dataController extends CallApiController 
         {

     
			public function update_fba_data(Request $req){
			//print_r($req->all());exit();
		 	 $data=DB::select("call update_new_fba_fbaList($req->fbaid)");	

		  	if (!empty($data)) {
		  	return $this->send_success_response('Successfully','Success',$data);
		  }else{
		  	return $this->send_failure_response('Data Not Found','Failure',[]);
		  }
		 //print_r($data);exit();
	}


  }