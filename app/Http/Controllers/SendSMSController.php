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

class SendSMSController extends Controller
{
    public function ViewSendSMSDetails(Request $req){
    	// $data=$req->smslist;
    	// print_r($data);exit();
    	
     // print_r('smslist');exit();

        $query=DB::select("call usp_loadfsm_list(?)",[2]);
        
       //  print "<pre>";
       // print_r($query);exit();
         return view('dashboard/send-sms',['query'=>$query]);
    }
}

 //     print_r($data); exit();