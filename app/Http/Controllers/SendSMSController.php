<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public function ViewSendSMSDetails()
    {
    	return view('dashboard/send-sms');
    }

    // public function SelectSendSMSDetails(Request $req)
    // {
    //     $data = $req->league;
    //     print_r($data); exit();
    //     return view('dashboard/send-sms');
    // }
}