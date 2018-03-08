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
     
              $users=DB::select('call sp_assign_list()');
              $product=DB::select('call sp_product_master_list')   ;
              return view('product_authorized',['userlist'=>$users,'product'=>$product]);


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

                  echo "gdfgdfg";
           }
           
      }
}
