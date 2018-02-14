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
class SendNotificationController extends InitialController
{
       
      Public function Sendnotification(){
       
		$query= DB::select("call usp_loadnotificationfba('$flag','$value')");

       return view('dashboard.send-notification');

      }

}


