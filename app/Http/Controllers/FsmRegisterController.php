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
class FsmRegisterController extends Controller
{
	/*public function getFSM(){
       return view('dashboard.FSMregister');
   }*/

public function getsate()
{
   $query = DB::select("call usp_load_state_list()");
   $manager = DB::select("call usp_load_managers()");
			/*	print_r($query);
	        exit();*/
        return view('dashboard.FSMregister',['query'=>$query,'manager'=>$manager]);
}
public function getcity($id)
{
	$cities = DB::table("city_master")
                    ->where("stateid",$id)
                    ->pluck("cityname","city_id");
        return json_encode($cities);
        /*print_r($cities); exit();*/
}
 
 public function getpincode($flag,$value){
 	
 $pincode = DB::select("call usp_load_pincodes($flag,$value)");
  return json_encode($pincode);
}

}

