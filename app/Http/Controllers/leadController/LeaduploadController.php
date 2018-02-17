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
         
         $query=DB::select('call sp_raw_lead_master(?)',array(Session::get('emp_id')));

 

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
    
      ]);$arra=array(
         'name'=>$value['name'],
         'mobile'=>$value['mobile'],
         'email'=>$value['email'],
         'dob'=>$value['dob'],
         'profession'=>$value['profession'],
         'monthly_income'=>$value['monthlyincome'],
         'pan'=>$value['panno'],
          'city_id'=>1,
           'address'=>$value['address'],
            'pincode'=>$value['pincode'],
            'campaign_id'=>$value['campaign'],
            'user_id'=>Session::get('emp_id'),
            'ip_address'=>\Request::ip(),
            'created_on'=>date('Y-m-d H:i:s'),); 


      if ($val->passes()){ DB::table('raw_lead_master')->insert($arra);} 
  }

        

        public function lead_update(Request $req){
        	           $status=null;
        	           $error=1;
        	           $arr=array();
        	             try{
        	             	 if($req->lead_status_id==14){
        	             	 	$mes=$this->interested($req->mobile);
        	             	 	if($mes==0){ $status="msm"; }
        	             	 }
                            $arra=array( "lead_type"=>$req->lead_type_id ,   
                                   "remark"=>$req->remark,
                                   "lead_status_id"=>$req->lead_status_id,
                                  "followup_date"=>date('Y-m-d H:i:s'),
                                   "lead_date"=>date('Y-m-d H:i:s'),
                        	);   DB::table('raw_lead_master')  ->where('id',$req->lead_id) ->update($arra); 
                         $error=0; 
                        }catch (Exception $e){  $error=1;  }
                       return $arr[]=array('status'=>$status,'error'=>$error);

}

        public   function interested($mobile){


          try{
            $error=null;
            $post_data='{
            "mobNo":"8898540057",
            "msgData":"Dear ...,http://localhost:8000/lead-up-load"}';

            $url ="http://services.rupeeboss.com/LoginDtls.svc/xmlservice/sendSMS";
            $result=$this->call_json($url,$post_data);
            $http_result=$result['http_result'];
            $error=$result['error'];
            $obj = json_decode($http_result);
            if($obj->status=='success'){
              $error=0;
            }else{
              $error=1;
            }
            }catch (Exception $e){  $error=1;  }
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
