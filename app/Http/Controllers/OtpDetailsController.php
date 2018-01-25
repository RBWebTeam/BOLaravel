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
class otpDetailsController extends Controller
{
       
        public function otp_details1(){
      // $query=DB::select("call usp_load_leads()");
         // print_r("test"); exit();

             return view ('dashboard.otp-details');      
                
        	 
               
        }
    }