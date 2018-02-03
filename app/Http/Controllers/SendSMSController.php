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
    public function ViewSendSMSDetails()
    {
    	return view('dashboard/send-sms');
    }

        public function sms_load(){

        $query=DB::select("call usp_loadfsm_list($flag,$value)");

        return view('dashboard.send-sms',['query'=>$query]);
    }
}

 //     print_r($data); exit();