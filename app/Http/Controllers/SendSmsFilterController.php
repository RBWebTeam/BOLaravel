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
public function sendsmsre(){

$state = DB::select("call usp_load_state_list()");
  return view('dashboard.send-sms-register',['state'=>$state]);
 }
public function SendSMSFilter(Request $req){
  print_r($req->all());exit();
try{
   $SMSTemplate=DB::table('SMSTemplate')->get();                    
   if(isset($req->ID)){
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[0,0,0,0]);
 return response()->json(array('sms_data' =>$query));
  } 
  if(isset($req->ID)){ 
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[2,$req->FBAID,0,0]);
  return response()->json(array('sms_data' =>$query));
  } 
  if(isset($req->city)){ 
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[1,$req->city,0,0]);
   return response()->json(array('sms_data' =>$query));
  } 

  if(isset($req->state)){ 
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[3,$req->state,0,0]);
  print_r($query);exit();
   return response()->json(array('sms_data' =>$query));
  } 

  if(isset($req->fDate) && isset($req->tDate)  ){
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[2,0,$req->fDate,$req->tDate]);
  return response()->json(array('sms_data' =>$query));
 } 
 if(isset($req->smstemplate_id)){
  print_r($req->$smstemplate_id);exit();
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
   public function getfbalist(Request $req){
    if(isset($req->city_name)){ $city = $req->city_name;}else{ $city = null;}
    if(isset($req->fdate)){$fdate = $req->fdate;}else{$fdate=null;}
    if(isset($req->todate)){$tdate = $req->todate;}else{$tdate = null;}
    if(isset($req->state_id)){$state = $req->txtmapstate;}else{$state = null;}
    $query=DB::select('call smsdata(?,?,?,?,?)',[$req->smslist,$txtmapstate,$city_name,$fdate,$tdate]);
    return json_encode($query);
  }



  //  public function getfbalist(Request $req){
  // if(isset($req->city_name)){ $city = $req->city_name;}else{ $city = '';}
  // if(isset($req->fdate)){$fdate = $req->fdate;}else{$fdate='';}
  // if(isset($req->todate)){$tdate = $req->todate;}else{$tdate = '';}
  // $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[$req->smslist,$city,$fdate,$tdate]);
  // return json_encode($query);
  // }
  public function send_sms_save(Request $req){  
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
   $query=DB::select('call usp_insert_smslog(?,?,?,?,,?,userid)',[$fid,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);
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


    public function getsmscity($id)
  {
    $cities = DB::table("city_master")
                      ->where("stateid",$id)
                    //  ->orderBy('cityname', 'asc')
                     ->pluck("cityname","cityname")
                      ;
          return json_encode($cities);
        
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