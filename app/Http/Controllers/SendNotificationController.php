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
public function Sendnotification(Request $req){
return view('dashboard.send-notification');
 }
 public function getstate()
  {
  $state = DB::select("call usp_load_state_list()");

  return view('dashboard.send-notification',['state'=>$state]);
  }
  public function getcity($id)
  {
  $cities = DB::table("city_master")
  ->where("stateid",$id)
  ->pluck("cityname","city_id");
  return json_encode($cities);
  }
   public function getfba($flag,$value)
  {
   $fbalist = DB::select("call usp_loadnotificationfba($flag,$value)");
   return json_encode($fbalist);
  }
 public function insertntf(Request $req){
   $image = $req->file('notify_image');
   $name = time().'.'.$image->getClientOriginalName();
   $destinationPath = public_path('upload/notification/'); //->save image folder 
   $image->move($destinationPath, $name); 
   $var=$req->txtdate.' '.$req->notificationhours.':'.$req->notificationminutes;
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
    }
    }

