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
class ProductfollowupController extends Controller
{
  public function getproductfollowup()
  {
  	$id=Session::get('fbauserid');
  	 $product = DB::select("call Usp_loaduserwiseproduct($id)");
  	  $status = DB::select("call Usp_Rmstatus()");
  	 return view('dashboard.productfollowup',['product'=>$product,'status'=>$status]);
  } 

  public function getproductinfo($product_id)
  {
	$query = DB::select("call Usp_getproductwisefba($product_id)");
      return json_encode($query);
      print_r($query); exit();
  }

  public function insertproductfollowup(Request $req){
  	$id=Session::get('fbauserid');
    DB::statement('call sp_followup_details_history_insert(?,?,?,?,?,?,?)',
  	array(
  	$req->txtproductfbaid,
    $id,
    $req->txtproductstatus,
    0,
    $req->txtproductrmremark,
    "Product executive",
    null ));
  }
  
  public function getproducthistory($Lead_id){
     $history = DB::select("call Usp_getproductwisehistory($Lead_id)");
      return json_encode($history);
    
  }
}