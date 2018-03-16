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
class FbaController extends CallApiController
{
      
        public function fba_list()
        {
         $doctype = DB::select("call get_document_type()");
          return view('dashboard.fba-list',['doctype'=>$doctype]);
        }
        public function get_fba_list(Request $req){
          $query=DB::select("call fbaList(0)");

          return json_encode(["data"=>$query]);
        }

        public function updateposp($fbaid,$value,$flag) {
          DB::select("call usp_update_posploanid('$fbaid','$value','$flag')");
          return redirect('fba-list');
        }
        public function sendsms(Request $req) {

              $newsms = str_replace(' ', '%20', $req->sms);
              $post_data="";
              $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->mobile_no.'&message[]='.$newsms,$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
              $update_user='';
              $obj = json_decode($m);

        }


         public function uploaddoc(Request $req) {
             
             $data=$req->all();
            /* $data = $this->request->input('json_decode');*/
             print_r($data); exit();
              $post_data=$data;
              $result=$this->call_json_data_api('api.magicfinmart.com/api/upload-doc',$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
              $update_user='';
              $obj = json_decode($m);
}

        public function sales(Request $req){
        // print_r($req->all());exit();
        $query=DB::table('fbamast')
            ->where('FBAID','=',$req->p_fbaid)
            ->update(['salescode' =>$req->p_remark]);
           if ($query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }

        public function loan(Request $req){
          // print_r($req->all());exit();
          $query=DB::table('fbarepresentations')
            ->where('FBAID','=',$req->fba_id)
            ->update(['LoanID' =>$req->remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }

        public function posp(Request $req){
          // print_r($req->all());exit();
          $query=DB::table('fbarepresentations')
            ->where('FBAID','=',$req->fbaid)
            ->update(['POSPNo' =>$req->posp_remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }

        }

        public function getfbapartner(Request $req)
        {          
          $fsmfbaquery = DB::select("call usp_load_partner_info(?)",[$req->fbaid]);

          return json_encode($fsmfbaquery);    
        }

        public function getfbalist($fbaid)
       {
         $doctype = DB::select("call get_fba_doc($fbaid)");
        
          return json_encode($doctype);
        }


        public function getpaymentlink($fbaid){
          
        
        $paymentlink=DB::select("call Usp_paymentlink($fbaid)");
         
         return json_encode($paymentlink);
  
          }

  
}


