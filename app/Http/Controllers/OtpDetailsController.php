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
class OtpDetailsController extends InitialController
{
       
        public function otp_details1(){

/*
          $query=DB::select("call CreateOTPTransaction('c')");
                print_r($query); exit();*/

return view('dashboard.otp-details'/*,['query'=>$query]*/);
        }

}

