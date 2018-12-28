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
class CommissionController extends CallApiController{


	// public function Commissionshow(){

	// 	return view('commission');
	// }

	public function getproduct(){
		 // $pdetails=[];
	$cmproduct=DB::select("Call commission_product()");
	
	return view('commission',['cmproduct'=>$cmproduct]);
	}

}