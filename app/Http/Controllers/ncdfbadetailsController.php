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
class ncdfbadetailsController extends CallApiController {

  			public function ncdfbadetails($fbaid){
  			$data=DB::select("call ncd_fba_data($fbaid)");
			return view('ncd_fba_details', ['data'=>$data]);
 }

}