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

class SendNotificationApproveController extends Controller
{
       
 
  public function SendnotificationApprove(){ 
        
       $query=DB::select("call usp_load_fba_Notification()");

  return view ('dashboard.send-notification-approve',['query'=>$query]);

}



 public function approvenotification($msgid,$value){

 	DB::select("call sp_notification_update($msgid,$value)");

    
  
  }
}


