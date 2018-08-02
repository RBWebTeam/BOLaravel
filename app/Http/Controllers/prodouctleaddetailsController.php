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


class prodouctleaddetailsController extends CallApiController
{

public function viewlead_details (){

	 $query=[];
		$ldata=DB::select("call usp_load_lead_details()");
		return view('prodouct-lead-details',['ldata'=>$ldata]);
	
}

// 		public function load_lead_data(){
// 	    $query=[];
// 		$ldata=DB::select("call usp_load_lead_details()");
// 		return view('prodouct-lead-details',['ldata'=>$ldata]);

		   
		

// }




}
