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
class statewisecityController extends CallApiController
{


 			public function get_city(){
			$state = DB::select("call usp_load_state_list()");
   			 return view('city_wise_state');
   			 	
 }


     public function statewisecity (Request $req){
	$fbascity = DB::select('call getquick_city_state(?,?)',[implode(',',$req->state),implode(',',$req->city)]);
    return json_encode($fbascity);
 
 }


         	public function showlead2 (){
			$fbascity2 = DB::select('call getquick_city_state(0,0)'); 
          	//$userfb=DB::select("call get_fba_fbauser()"); 
			return view('city_wise_state',['fbascity2'=>$fbascity2]);
 }




}