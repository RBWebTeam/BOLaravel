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

class SendNotificationController extends Controller
{
public function Sendnotification(){

$state = DB::select("call usp_load_state_list()");
  return view('dashboard.send-notification',['state'=>$state]);
 }
 // public function getstate(){
 //  $state = DB::select("call usp_load_state_list()");
 //  return view('dashboard.send-notification',['state'=>$state]);
 //  }

public function SendnotificationApprove(){ 
$query=DB::select("call usp_load_fba_Notification()");
return view ('dashboard.send-notification-approve',['query'=>$query]);
}
public function approvenotification($msgid,$value){
DB::select("call sp_notification_update($msgid,$value)");
}

public function notificationApprove(){ 
$query=DB::select("call usp_load_notification()");
return view ('dashboard.approve-notification',['query'=>$query]);
}

public function sendnotificationsubmit(Request $req){
  $upload_folder='upload/notification/';
 $newsms = urlencode($req->sms);
$image = $req->file('notify_image');
   $name = time().'.'.$image->getClientOriginalName();
   $destinationPath = public_path($upload_folder); //->save image folder 
   $image->move($destinationPath, $name); 
   $var=$req->txtdate.' '.$req->notificationhours.':'.$req->notificationminutes;
   $name=$upload_folder.$name;
   //print_r($name);exit();
   $msgid=DB::select('call sp_insert_notifications(?,?,?,?,?,?,?,?)',array(
   $req->notificationtitle,
   $req->txtmessage,
   $name,
   $req->LeadType,
   $req->weburl,
   $req->webtitle,
   $var,
   1
     ));
    foreach ($req->fba_list as $key => $value) {
    DB::select('call sp_insert_nofity_request(?,?,?,?)',array(
    $msgid[0]->id,
    $value,
    $var,
    1
    ));
    }
     if ($msgid) {
       return Response::json(array(
        'data' => true,
      ));
      }else{
    return Response::json(array(
       'data' => false,
     ));
    }
    }
 public function getcity($id)
  {
  $cities = DB::table("city_master")

  ->where("stateid",$id)
  
  ->orderBy('city_master.cityname', 'asc')
  ->pluck("cityname","city_id");
    return json_encode($cities);
  }
   public function getfba($flag,$value)
  {
   $fbalist = DB::select("call usp_loadnotificationfba($flag,$value)");
   return json_encode($fbalist);
  }


 

// public function getmobileno($id)
//   {
//   $mobileno = DB::table("Fbamast")


//   ->where("Fbaid",$id)
//   ->pluck("MobiNumb1","Fbaid");
//   return json_encode($mobileno);
//    print_r($mobileno);
//   }


 // public function insertntf(Request $req){
 
 //    }


 }

  
