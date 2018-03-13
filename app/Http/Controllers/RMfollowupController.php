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
class RMfollowupController extends Controller
{
public function RMfollowup() 
        {
        	$id=Session::get('fbauserid');
        	
        	$query = DB::select("call usp_fbadetails($id)");
          $product = DB::select("call Usp_productmaster()");
          $status = DB::select("call Usp_Rmstatus()");  
            return view('dashboard.RMfollowupdetails',['query'=>$query,'product'=>$product,'status'=>$status]);
        }

public function insertrmfollowup(Request $req)
{
	$id=Session::get('fbauserid');
  DB::statement('call sp_followup_details_history_insert(?,?,?,?,?,?,?)',
  	array(
  	$req->txtfbaid,
    $id,
    $req->txtrmstatus,
    0,
    $req->txtrmremark,
    "RM" ,
    null ));

  DB::statement('call usp_update_intrestedproduct(?,?)',
  	array($req->txtproductid,
  	      $req->txtfbaid));
  
  DB::statement('call usp_inserproductwiseusers(?,?,?)',
    array($id,
          $req->txtfbaid,
          $req->txtproductid));
}   

public function gethistory($fbaid){
	$query = DB::select("call Usp_rmhistory($fbaid)");
      return json_encode($query);
      print_r($query); exit();
}

}