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
use api_url;

class SendSmsFilterController extends InitialController
{
public function SendSMSFilter(Request $req){
try{
$SMSTemplate=DB::table('SMSTemplate')->get();                    
if(isset($req->ID)){
$query=DB::select('call sp_fba_sent(?,?,?,?)',[0,0,0,0]);
 return response()->json(array('sms_data' =>$query));
} 
if(isset($req->ID)){ 
$query=DB::select('call sp_fba_sent(?,?,?,?)',[2,$req->FBAID,0,0]);
return response()->json(array('sms_data' =>$query));
} 
if(isset($req->city)){ 
$query=DB::select('call sp_fba_sent(?,?,?,?)',[1,$req->city,0,0]);
return response()->json(array('sms_data' =>$query));
} 
if(isset($req->fDate) && isset($req->tDate)  ){
$query=DB::select('call sp_fba_sent(?,?,?,?)',[2,0,$req->fDate, $city, $req->tDate]);
return response()->json(array('sms_data' =>$query));
} 
if(isset($req->smstemplate_id)){
foreach ($SMSTemplate as $key => $value) {
if($value->SMSTemplateId==$req->smstemplate_id){
return $value->Template;
break;
}
}
}
return view('dashboard/send-sms-register',['SMSTemplate'=>$SMSTemplate]);
}catch (Exception $e){
return 0;               
}
}
public function getfbafilter(Request $req){
try {
$city=isset($req->city_name)?$req->city_name:'';
$fdate= isset($req->fdate)?$req->fdate:'';
$tdate=(isset($req->todate))?$req->todate: '';
$query=DB::select('call sp_fba_sent(?,?,?,?)',[$req->smslist,$fdate, $city,$tdate]);
return json_encode($query);
} catch (\Exception $e) {
 return $e->getMessage();
}
}
 public function send_sms_save_filter(Request $req){  
$parentgroupid=uniqid();
$error='';
$url=$this::$api_url;
if(isset($req->fba))
$fid = "";
for ($i=1; $i < count($req->fba)+1; $i++) { 
if($i%100==0){
 $uniqid=uniqid();
  $fid=$fid.','.$req->fba[$i-1];
  $fid = ltrim($fid, ',');
  $userid=Session::get('fbauserid');
   $query=DB::select('call usp_insert_smsregister(?,?,?,?,userid)',[$fid,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);
  $data='{"group_id":"'.$uniqid.'"}';
   $this->call_json($url.'/api/send-sms',$data);        
   $fid = "";
  }
  else{        
  $fid=$fid.','.$req->fba[$i-1];      
  }
  }
  
 Session::flash('msg', "message  successfully send...");;
  return Redirect::back();
    }
public function sentsms($mob,$text,$fba_id,$SMSTemplateId){
    $arr=array('fbaid'=>$fba_id,'mobileno'=>$mob,'message'=>$text,'create_date'=>date('Y-m-d H:i:s') );
   DB::table('SMSLog')->insert($arr);
    }
   public function call_json($url,$data){
  $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','token:1234567890'));
  curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FAILONERROR, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
 $http_result = curl_exec($ch);
  $error = curl_error($ch);
  $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
  curl_close($ch);
  $result=array('http_result' =>$http_result ,'error'=>$error );
  return $result;
  }
  }