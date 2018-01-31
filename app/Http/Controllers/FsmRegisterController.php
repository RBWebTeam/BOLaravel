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
   $state = DB::select("call usp_load_state_list()");
   $manager = DB::select("call usp_load_managers()");
   
			/*	print_r($query);
	        exit();*/
        return view('dashboard.FSMregister',['state'=>$state,'manager'=>$manager]);
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

public function insertfsm(Request $req){

    DB::statement('call sp_insert_FBAReg(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
      $req->txttitle,
      $req->txtFname,
      $req->txtLname,
      $req->txtCname,
      $req->txtemail,
      $req->txtMobile,
      $req->txtdate,
      $req->rdoyes,
      $req->rdono,
      $req->txtpan,
      $req->txtAadhar,
      $req->txtPincode,
      $req->txtCity,
      $req->txtstate,
      $req->txtmanager,
      $req->txtfsmtype,
      $req->State,
      $req->city,
      $req->txtbankacno,
      $req->txtactype,
      $req->txtifsc,
      $req->txtmicr,
      $req->txtbankno,
      $req->txtbankbrach,
      $req->txtbankcity

    ));
     return view ("dashboard.FSMregister");
  }

}

