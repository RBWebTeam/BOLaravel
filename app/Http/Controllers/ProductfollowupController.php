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
  	 $product = DB::select("call Usp_loaduserwiseproduct(6923)");
  	 return view('dashboard.productfollowup',['product'=>$product]);
  } 

  public function getproductinfo($product_id)
  {
	$query = DB::select("call Usp_getproductwisefba($product_id)");
      return json_encode($query);
      print_r($query); exit();
  }
}