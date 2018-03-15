<?php

namespace App\Http\Controllers\leadController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Validator;
class LeaduploadController extends Controller{
      public   function lead_up_load(){
                 // $query=DB::table('raw_lead_master')->get();
                  $lead_status=DB::table('lead_status_master')->get();
                  $lead_type=DB::table('lead_type_master')->get();
                
                 
            $query=DB::select('call sp_raw_lead_master(?)',array(Session::get('fbauserid')));

 
     //print_r($followup_lead);exit;

      	     return view('lead_view.lead_upload',['query'=>$query,'lead_type'=>$lead_type,'lead_status'=>$lead_status]);
      }

    

    public function importExcel(Request $request){
       	 $data=array();
       	 try{
        if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader)  use ($data) {
                foreach ($reader->toArray() as $key => $row) {
                          if(!empty($row)){
                          $this->import($row);  
                     }
                }
            });
        }
           Session::put('success', 'Youe file successfully import in database!!!');
          return back();
         	}catch (Exception $e){
                return $e;               
            }

             

    }


 public function import($value){
 $val =Validator::make($value,[  
 	'mobile' =>  'required|regex:/^[0-9]{10}+$/|unique:raw_lead_master',
    'email' =>  'required|email|unique:raw_lead_master',
    'panno' =>  'required',
    'pincode' =>  'required',
     'city' =>  'required',

      ]);


if ($val->passes()){ 
$city= DB::table('city_master')->where('cityname', 'LIKE', "%{$value['city']}%")->first();
if(isset($city->city_id)){
        $arra=array(
         'name'=>$value['name'],
         'mobile'=>$value['mobile'],
         'email'=>$value['email'],
         'dob'=>$value['dob'],
         'profession'=>$value['profession'],
         'monthly_income'=>$value['monthlyincome'],
         'pan'=>$value['panno'],
          'city_id'=>$city->city_id,
           'address'=>$value['address'],
            'pincode'=>$value['pincode'],
            'campaign_id'=>$value['campaign'],
            'user_id'=>Session::get('fbauserid'),
            'ip_address'=>\Request::ip(),
            'created_on'=>date('Y-m-d H:i:s'),); 
      	DB::table('raw_lead_master')->insert($arra);    } } 
  }

        

        public function lead_update(Request $req){
        	           $status=null;
        	           $error=1;
                     $check=0;
                     $followup= $req['lead_followup']?$req['lead_followup']:null; 

        	           $arr=array();
        	             try{
        	             	 if($req->lead_status_id==14){
        	             	  // $mes=$this->interested($req->mobile,$req->lead_id);
                           $mes=0;
        	             	 	if($mes==0){ $status="msm"; 
                             $check=1;
                          }
        	             	 }
                          
                            $arra=array( "lead_type"=>$req->lead_type_id ,   
                                   "remark"=>$req->remark,
                                   "lead_status_id"=>$req->lead_status_id,
                                  "followup_date"=>$followup,
                                   "lead_date"=>date('Y-m-d H:i:s'),
                                   "conf_status"=>$check,
                        	);   DB::table('raw_lead_master')->where('id',$req->lead_id) ->update($arra); 

                       
                          //  followup table
                           $history=array(
                                   $req->lead_id,
                                   Session::get('fbauserid'),
                                   $req->lead_status_id,
                                   $req->lead_type_id,
                                   $req->remark,
                                   'caller',
                                   date('Y-m-d H:i:s') );
                      
                         DB::select('call sp_followup_details_history_insert(?,?,?,?,?,?,?)',$history);
                       
                         $error=0; 
                        }catch (Exception $e){  $error=1;  }
                       return $arr[]=array('status'=>$status,'error'=>$error);

}

public   function interested($mobile,$lead_type_id){
$error=1;
try{
$referrer_id="abcd123";

 
  $url_msg="https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyC5QQQlA1pEPjcZcD86xJ7nZrGOrhMk8LI";
  $data_msg='{
        "longUrl":"https://play.google.com/store/apps/details?id=com.datacomp.magicfinmart&referrer='.$referrer_id.'"
         }';
 $result_msg=$this->call_json($url_msg,$data_msg);
 $http_result_msg=$result_msg['http_result'];
 $obj_msg= json_decode($http_result_msg);
 if(isset($obj_msg->longUrl)){
     $longUrl=$obj_msg->longUrl;
     $link=$obj_msg->id;
      //lecho      $link;exit;
      if($sms_result==0){
        $sms_result=$this->sent_msg($referrer_id,$link,$mobile,$lead_type_id);
      $error=0;
      }else{
        $error=1;
      }
      }else{
      $error=1; 
      } 
          
            
     }catch (Exception $e){  $error=1;  }
return $error;

  
        
  } 

public   function lead_test(){





     $query=DB::table('raw_lead_master')->select('id','mobile')->get();


     foreach ($query as $key => $value) {
            if($key>19822){
             exit;
              }
      $url_msg="https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyC5QQQlA1pEPjcZcD86xJ7nZrGOrhMk8LI";
      $data_msg='{
          "longUrl":"http://bo.magicfinmart.com/marketing_leads?id='.$value->id.'"
           }';
   $result_msg=$this->call_json($url_msg,$data_msg);
   $http_result_msg=$result_msg['http_result'];
   $obj_msg= json_decode($http_result_msg);
   if(isset($obj_msg->longUrl)){
       $longUrl=$obj_msg->longUrl;
       $link=$obj_msg->id;
      $arr=array('link' =>$link);
      DB::table('raw_lead_master')->where('id','=',$value->id)->update($arr);
       
    } 
  }

     


}


public function  marketing_leads(Request $req){
  $lang=null;
  
  $status=null;
  $a=array("6923","6925","6926","6927");
$random_keys=array_rand($a,1);
//var_dump($random_keys);

         if(isset($req->id)){
       $arr=array('video_click' =>1,
         'video_date_time'=>date('Y-m-d H:i:s'),
          'user_id'=> $a[$random_keys]
         );
       $query=DB::table('raw_lead_master')->where('id','=',$req->id)->update($arr);
       $select=DB::table('raw_lead_master')->where('id','=',$req->id)->first();
        $lang=$select->lang;

}  
 if(isset($req->mobile)){
$arr=array('misscall' =>1,
         'mc_date_time'=>date('Y-m-d H:i:s'),
            'user_id'=>$a[$random_keys]
         );
       DB::table('raw_lead_master')->where('mobile','=',$req->mobile)->update($arr);
        
        $select=DB::table('raw_lead_master')->where('mobile','=',$req->mobile)->first();
        $lang=$select->lang;
  } 

 

 



            return  view('marketing_leads')->with('lang',$lang);

  }

public function sent_msg($referrer_id,$link,$phone,$lead_type_id){
  try{
  $arra=array(
    'ref_code'=>$referrer_id,
    'ref_type'=>Session()->get('UserType'),
    'ref_id'=>Session()->get('FBAId'),
    "created_on"=>date('Y-m-d H:i:s'),
    'lead_id'=>$lead_type_id,
  );
$post_data='{
            "mobNo":"8898540057",
            "msgData":"'.$link.'",
             }';
 
            $url ="http://services.rupeeboss.com/LoginDtls.svc/xmlservice/sendSMS";
            $result=$this->call_json($url,$post_data);
            $http_result=$result['http_result'];
            $error=$result['error'];
             $obj = json_decode($http_result);
 
            if($obj->status=='success'){
               DB::table('referral_master')->insert($arra);
              $error=0;

            }else{
              $error=1;
            }
         
          }catch (Exception $e){  $error=1; }
            return $error;

}

public function call_json($url,$data){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
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








public function lead_management_update(Request $req){   

$error=null;
   try{ 
                          //   $arra=array(
                          //  'name'=>$req->name?$req->name:null,
                          //  'mobile'=>$req->mobile?$req->mobile:null,
                          //  'email'=>$req->email?$req->email:null,
                          //  'dob'=>$req->dob?$req->dob:null,
                          // // 'profession'=>$req->profession?$req->profession:null,
                          // // 'monthly_income'=>$req->monthly_income?$req->monthly_income:null,
                          //  'pan'=>$req->pan_no?$req->pan_no:null,
                          //  // 'city_id'=>$city->cityname,
                          //    'address'=>$req->address?$req->address:null ,
                          //     'pincode'=>$req->pincode?$req->pincode:null ,
                          //     // 'campaign_id'=>$req->campaign?$req->campaign:null ,
                          //     'user_id'=>Session::get('fbauserid'),
                          //     'ip_address'=>\Request::ip(),
                          //     'created_on'=>date('Y-m-d H:i:s'),); 

$arra=array(
                           $req->name?$req->name:null,
                           $req->mobile?$req->mobile:null,
                            $req->email?$req->email:null,
                            $req->dob?$req->dob:null,
                            $req->pan_no?$req->pan_no:null,
                             $req->address?$req->address:null ,
                              $req->pincode?$req->pincode:null ,
                              Session::get('fbauserid'),
                              \Request::ip(),
                               date('Y-m-d H:i:s'),
                               $req->lead_id

                               ); 


 
                          
                            DB::select('call sp_lead_management_update(?,?,?,?,?,?,?,?,?,?,?)',$arra);
                            // $query=DB::table('raw_lead_master')->where('id','=',$req->lead_id)->update($arra);
                             $error=0;
            
             }catch (Exception $e){  $error=1; }

             return $error;
          

     

        

}






public function sms($mob,$mess){

// return  options = {
//     method: 'POST',
//     uri: 'http://services.rupeeboss.com/LoginDtls.svc/xmlservice/sendSMS',
//     body: {
//          "mobNo":"8898540057",
// "msgData":mess,
// "source":"web"
//     },
//     json: true 
// };

// }


}



}
