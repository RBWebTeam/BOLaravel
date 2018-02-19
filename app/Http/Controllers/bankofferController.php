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
class bankofferController extends InitialController
{
       
        public function bank_offer (){

       $query=DB::select("call usp_load_cities1()");
       $state=DB::select("call usp_load_state_list()");
       $pincode=DB::select("call usp_load_pincode1()");
       // $pincode=DB::select("call usp_load_pincodes(3,".'pincode'.")");

       


        return view('dashboard.bankoffer',['query'=>$query,'state'=>$state,'pincode'=>$pincode]);
  

       
      
        }

}
