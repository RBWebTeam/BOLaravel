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
 
class SendSMSController extends InitialController{
 public function ViewSendSMSDetails(Request $req){           
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

       if(isset($req->fDate) && isset($req->tDate)  ){
      $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[2,0,$req->fDate,$req->tDate]);
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
     return view('dashboard/send-sms',['SMSTemplate'=>$SMSTemplate]);
     }catch (Exception $e){
     return 0;               
     }  
     }
   public function getfbalist(Request $req){
  if(isset($req->city_name)){ $city = $req->city_name;}else{ $city = '';}
  if(isset($req->fdate)){$fdate = $req->fdate;}else{$fdate='';}
  if(isset($req->todate)){$tdate = $req->todate;}else{$tdate = '';}
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[$req->smslist,$city,$fdate,$tdate]);
   return json_encode($query);
   }

public function send_sms_save(Request $req){  
     $parentgroupid=uniqid();
      $error='';
      $url=$this::$api_url;
      $fbauserid=Session::get('fbauserid');
    if(isset($req->fba))
    
    $fid = "";
  $isdirectsend=DB::select('call get_isdirectsned(?)',[$fbauserid]);

  for ($i=1; $i < count($req->fba)+1; $i++) { 
    if($i%100==0){
      $uniqid=uniqid();
        $fid=$fid.','.$req->fba[$i-1];
        
        $fid = ltrim($fid, ',');
        $query=DB::select('call usp_insert_smslog(?,?,?,?,?,?)',[$fid,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);
        $data='{"group_id":"'.$uniqid.'"}';
 if($isdirectsend==1){
        $this->call_json($url.'/api/send-sms',$data);        
        $fid = "";
    }

    }
    else{        
        $fid=$fid.','.$req->fba[$i-1];
        
    }
  }
  if($fid!=""){
    $uniqid=uniqid();
    $fid = ltrim($fid, ',');
    $query=DB::select('call usp_insert_smslog(?,?,?,?,?,?)',[$fid,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);  
     $data='{"group_id":"'.$uniqid.'"}';
 if($isdirectsend==1){
    $this->call_json($url.'/api/send-sms',$data);
  }
  }
 
           
           Session::flash('msg', "message  successfully send...");;
           return Redirect::back();
                

    }


    public function sentsms($mob,$text,$fba_id,$SMSTemplateId)
    {
      $arr=array('fbaid'=>$fba_id,'mobileno'=>$mob,'message'=>$text,'create_date'=>date('Y-m-d H:i:s') );
       DB::table('SMSLog')->insert($arr);
       





      // $post_data='{
      //       "mobNo":"8898540057",
      //       "msgData":"'.$text.'",
      //        }';
      //       $url ="http://services.rupeeboss.com/LoginDtls.svc/xmlservice/sendSMS";
      //       $result=$this->call_json($url,$post_data);
      //       $http_result=$result['http_result'];
      //       $error=$result['error'];
      //       $obj = json_decode($http_result);
      //       if($obj->status=='success'){
      //           // DB::table('SMSLog')->insert($arr);
      //           return 0;
      //       }else{
      //           return 1;
      //       } 
    }
      public function call_json($url,$data){
      $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','token:1234567890'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
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

  