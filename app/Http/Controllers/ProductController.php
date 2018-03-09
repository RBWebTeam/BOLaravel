<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Validator;
use Redirect;

class ProductController extends Controller
{
      
      public function product_authorized(Request $req){
            if(isset($req->ID)){
                $query=DB::select('call sp_product_master_assign(?)',[$req->ID]);
                return   $query;
              }
 
               $users=DB::select('call sp_assign_list()');
               return view('product_authorized',['userlist'=>$users]);
      }


      public function product_save(Request $req){
              $validator =Validator::make($req->all(), [
              'user_name' =>'required|not_in:0',
              'product_name' =>'required|not_in:--SELECT--']);
             if ($validator->fails()) {
             return redirect('product-authorized')
             ->withErrors($validator)
             ->withInput();
            }else{
                     
                  DB::table('product_mapping')->where('FBAUserId','=',$req->user_name)->delete(); 
                  foreach ($req->product_name as $key => $value) {
                  	  $arr=array($req->user_name,$value,Session::get('fbauserid'),date('Y-m-d H:i:s')); 
                  	   DB::select('call sp_product_mapping_insert(?,?,?,?)',$arr);
                  }
                  
                       Session::flash('msg', "Product-Authorized Successfully add... ");
                       return Redirect::back();

                
           }
           
      }
}
